<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Proyecto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Testing\TestResponse;

class AutorizacionProyectoTest extends TestCase
{
    // use RefreshDatabase;

    private static $apiurl_proyecto = '/api/v1/proyectos';

    public function proyectoIndex() : TestResponse
    {
        return $this->get(self::$apiurl_proyecto);
    }

    public function proyectoShow() : TestResponse
    {
        $proyecto = Proyecto::inRandomOrder()->first();
        return $this->get(self::$apiurl_proyecto . "/{$proyecto->id}");
    }

    public function proyectoStore() : TestResponse
    {
        $data = [
            'user_id' => 1,
            'nombre' => 'Proyecto de prueba',
            'dominio' => '123456',
        ];
        return $this->postJson(self::$apiurl_proyecto, $data);
    }

    public function proyectoUpdate($propio = false) : TestResponse
    {
        $proyecto = $propio
        ? Proyecto::create(['user_id' => Auth::user()->id, 'nombre' => 'Proyecto de prueba', 'dominio' => '123456'])
            : Proyecto::inRandomOrder()->first();
        $data = [
            'user_id' => 1,
            'nombre' => 'Proyecto de prueba',
            'dominio' => '123456',
        ];
        return $this->putJson(self::$apiurl_proyecto . "/{$proyecto->id}", $data);
    }

    public function proyectoDelete($propio = false) : TestResponse
    {
        $proyecto = $propio
            ? Proyecto::create(['user_id' => Auth::user()->id,'nombre' => 'Proyecto de prueba', 'dominio' => '123456'])
            : Proyecto::inRandomOrder()->first();
        return $this->delete(self::$apiurl_proyecto . "/{$proyecto->id}");
    }

    public function test_anonymous_can_access_proyecto_list_and_view()
    {
        $this->assertGuest();

        $response = $this->proyectoIndex();
        $response->assertStatus(200);

        $response = $this->proyectoShow();
        $response->assertStatus(200);

        $response = $this->proyectoStore();
        $response->assertUnauthorized();

        $response = $this->proyectoUpdate();
        $response->assertUnauthorized();

        $response = $this->proyectoDelete();
        $response->assertFound();

    }

    public function test_admin_can_CRUD_proyecto()
    {
        $admin = User::where('email', env('ADMIN_EMAIL'))->first();
        $this->actingAs($admin);

        $response = $this->proyectoIndex();
        $response->assertSuccessful();

        $response = $this->proyectoShow();
        $response->assertSuccessful();

        $response = $this->proyectoStore();
        $response->assertSuccessful();

        $response = $this->proyectoUpdate();
        $response->assertSuccessful();

        $response = $this->proyectoDelete();
        $response->assertSuccessful();
    }

    public function test_docente_can_access_proyecto_list_and_view()
    {
        $docente = User::where([
                ['email', 'like', '%@' . env('TEACHER_EMAIL_DOMAIN')],
                ['email', '!=', env('ADMIN_EMAIL')],
            ])->first();
        $this->actingAs($docente);

        $response = $this->proyectoIndex();
        $response->assertSuccessful();

        $response = $this->proyectoShow();
        $response->assertSuccessful();

        $response = $this->proyectoStore();
        $response->assertSuccessful();

        $response = $this->proyectoUpdate();
        $response->assertSuccessful();

        $response = $this->proyectoDelete();
        $response->assertSuccessful();

    }

}
