<?php

namespace Tests\Feature\Controllers;

use App\Http\Controllers\ArtistaController;
use App\Models\Artista;
use App\Models\Genero;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class ArtistaControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        // Criar registros de teste no banco de dados (usando factories se aplicável)
        Artista::factory()->create();

        // Chamar a rota correspondente ao método index do controlador
        $response = $this->get(route('artista.index'));

        // Verificar se a resposta tem o status HTTP 200 (OK)
        $response->assertOk();

        // Verificar se a view correta foi retornada
        $response->assertViewIs('artista.index');

        // Verificar se a variável "artista" está sendo passada para a view
        $response->assertViewHas('artista');
    }

    public function testCreate()
    {
        // Chamar a rota correspondente ao método create do controlador
        $response = $this->get(route('artista.create'));

        // Verificar se a resposta tem o status HTTP 200 (OK)
        $response->assertOk();

        // Verificar se a view correta foi retornada
        $response->assertViewIs('artista.create');

        // Verificar se a variável "generos" está sendo passada para a view
        $response->assertViewHas('generos');
    }

    // Outros métodos de teste podem ser adicionados aqui, seguindo a mesma estrutura

    // Exemplo de teste para o método store
    public function testStore()
    {
        // Criar um mock do objeto Request com os dados necessários para o teste
        $request = Request::create(
            route('artista.store'),
            'POST',
            [
                'ds_artista' => 'Nome do Artista',
                'id_genero' => 1,
                'historia' => 'História do artista',
                'imagem' => $this->createTestUploadedFile()
            ]
        );

        // Chamar o método diretamente no controlador usando o mock do Request
        $controller = new ArtistaController(new Artista(), new Genero());
        $response = $controller->store($request);

        // Verificar se o redirecionamento ocorreu com sucesso
        $response->assertRedirect(route('artista.index'));

        // Verificar se a mensagem de sucesso está sendo passada para a sessão
        $this->assertSessionHas('success', 'Artista registrado com sucesso!');
    }

    // Exemplo de teste para o método destroy
    public function testDestroy()
    {
        // Criar um artista de teste no banco de dados
        $artista = Artista::factory()->create();

        // Chamar o método diretamente no controlador, passando o ID do artista
        $controller = new ArtistaController(new Artista(), new Genero());
        $response = $controller->destroy($artista->id_artista);

        // Verificar se o redirecionamento ocorreu com sucesso
        $response->assertRedirect(route('artista.index'));

        // Verificar se a mensagem de sucesso está sendo passada para a sessão
        $this->assertSessionHas('success', 'Artista excluído com sucesso!');
    }

    // Função auxiliar para criar um arquivo de teste simulado
    private function createTestUploadedFile()
    {
        $file = tempnam(sys_get_temp_dir(), 'test');
        file_put_contents($file, 'conteúdo do arquivo de teste');
        return new \Illuminate\Http\UploadedFile(
            $file,
            'test.png',
            'image/png',
            null,
            true // Indica que o arquivo deve ser removido após o teste
        );
    }
}
