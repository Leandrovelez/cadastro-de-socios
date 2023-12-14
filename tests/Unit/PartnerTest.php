<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class PartnerTest extends TestCase
{
    public function testCreatePartnerWithMiddleware()
    {
        $data = [
            'name' => 'Socio teste',
            'email' => 'socio@teste.com',
            'type' => 'Silver',
            'cpf' => '021.355.380-51',
            'cep' => '69015-522',
            'state' => 'AM',
            'city' => 'Manaus',
            'address' => 'Rua Rio itu',
            'number' => '100',
            'complement' => null 
        ];

        $response = $this->json('POST', '/store',$data);
        $response->assertStatus(401);
        $response->assertJson(['message' => "Unauthenticated."]);
    }

    public function testCreatePartner()
    {
        $data = [
            'name' => 'Socio teste',
            'email' => 'socio@teste.com',
            'type' => 'Silver',
            'cpf' => '021.355.380-51',
            'cep' => '69015-522',
            'state' => 'AM',
            'city' => 'Manaus',
            'address' => 'Rua Rio itu',
            'number' => '100',
            'complement' => null 
        ];

        $partner = factory(\App\Partner::class)->create();
        $response = $this->actingAs($partner, 'api')->json('POST', '/store',$data);
        $response->assertStatus(200);
        $response->assertJson(['status' => true]);
        $response->assertJson(['message' => "Partner Created!"]);
        $response->assertJson(['data' => $data]);
    }

    public function testGettingAllPartners()
    {
        $response = $this->json('GET', '/dashboard');
        $response->assertStatus(200);

        $response->assertJsonStructure(
            [
                [
                        'name',
                        'email',
                        'type',
                        'cpf',
                        'cep',
                        'state',
                        'city',
                        'address',
                        'number',
                        'complement', 
                        'created_at',
                        'updated_at'
                ]
            ]
        );
    }

    public function testUpdatePartner()
    {
        $response = $this->json('GET', '/dashboard');
        $response->assertStatus(200);

        $partner = $response->getData()[0];

        $user = factory(\App\User::class)->create();
        $update = $this->actingAs($user, 'api')->json('PATCH', $partner->id.'/update/',['name' => "Changed for test"]);
        $update->assertStatus(200);
        $update->assertJson(['message' => "Partner Updated!"]);
    } 

    public function testDeleteProduct()
    {
        $response = $this->json('GET', '/dashboard');
        $response->assertStatus(200);

        $partner = $response->getData()[0];

        $user = factory(\App\User::class)->create();
        $delete = $this->actingAs($user, 'api')->json('DELETE', $partner->id.'/delete/');
        $delete->assertStatus(200);
        $delete->assertJson(['message' => "Partner Deleted!"]);
    }
}
