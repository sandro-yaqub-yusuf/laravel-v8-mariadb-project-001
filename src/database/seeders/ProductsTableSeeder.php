<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::withTrashed()->updateOrCreate(
            [
                'id' => 1
            ],
            [
                'name' => 'Produto 1',
                'description' => 'Descrição do Produto 1',
                'image' => 'produto_sem_imagem.jpg',
                'quantity' => 1,
                'cost_price' => 10,
                'sales_price' => 20,
                'status' => 'A'
            ]
        );
        Product::withTrashed()->updateOrCreate(
            [
                'id' => 2
            ],
            [
                'name' => 'Produto 2',
                'description' => 'Descrição do Produto 2',
                'image' => 'produto_sem_imagem.jpg',
                'quantity' => 2,
                'cost_price' => 20,
                'sales_price' => 40,
                'status' => 'A'
            ]
        );
        Product::withTrashed()->updateOrCreate(
            [
                'id' => 3
            ],
            [
                'name' => 'Produto 3',
                'description' => 'Descrição do Produto 3',
                'image' => 'produto_sem_imagem.jpg',
                'quantity' => 3,
                'cost_price' => 30,
                'sales_price' => 60,
                'status' => 'A'
            ]
        );
        Product::withTrashed()->updateOrCreate(
            [
                'id' => 4
            ],
            [
                'name' => 'Produto 4',
                'description' => 'Descrição do Produto 4',
                'image' => 'produto_sem_imagem.jpg',
                'quantity' => 4,
                'cost_price' => 40,
                'sales_price' => 80,
                'status' => 'A'
            ]
        );
        Product::withTrashed()->updateOrCreate(
            [
                'id' => 5
            ],
            [
                'name' => 'Produto 5',
                'description' => 'Descrição do Produto 5',
                'image' => 'produto_sem_imagem.jpg',
                'quantity' => 5,
                'cost_price' => 50,
                'sales_price' => 100,
                'status' => 'A'
            ]
        );
        Product::withTrashed()->updateOrCreate(
            [
                'id' => 6
            ],
            [
                'name' => 'Produto 6',
                'description' => 'Descrição do Produto 6',
                'image' => 'produto_sem_imagem.jpg',
                'quantity' => 6,
                'cost_price' => 60,
                'sales_price' => 120,
                'status' => 'A'
            ]
        );
        Product::withTrashed()->updateOrCreate(
            [
                'id' => 7
            ],
            [
                'name' => 'Produto 7',
                'description' => 'Descrição do Produto 7',
                'image' => 'produto_sem_imagem.jpg',
                'quantity' => 7,
                'cost_price' => 70,
                'sales_price' => 140,
                'status' => 'A'
            ]
        );
        Product::withTrashed()->updateOrCreate(
            [
                'id' => 8
            ],
            [
                'name' => 'Produto 8',
                'description' => 'Descrição do Produto 8',
                'image' => 'produto_sem_imagem.jpg',
                'quantity' => 8,
                'cost_price' => 80,
                'sales_price' => 160,
                'status' => 'A'
            ]
        );
        Product::withTrashed()->updateOrCreate(
            [
                'id' => 9
            ],
            [
                'name' => 'Produto 9',
                'description' => 'Descrição do Produto 9',
                'image' => 'produto_sem_imagem.jpg',
                'quantity' => 9,
                'cost_price' => 90,
                'sales_price' => 180,
                'status' => 'A'
            ]
        );
        Product::withTrashed()->updateOrCreate(
            [
                'id' => 10
            ],
            [
                'name' => 'Produto 10',
                'description' => 'Descrição do Produto 10',
                'image' => 'produto_sem_imagem.jpg',
                'quantity' => 10,
                'cost_price' => 100,
                'sales_price' => 200,
                'status' => 'A'
            ]
        );
        Product::withTrashed()->updateOrCreate(
            [
                'id' => 11
            ],
            [
                'name' => 'Produto 11',
                'description' => 'Descrição do Produto 11',
                'image' => 'produto_sem_imagem.jpg',
                'quantity' => 11,
                'cost_price' => 110,
                'sales_price' => 220,
                'status' => 'A'
            ]
        );
        Product::withTrashed()->updateOrCreate(
            [
                'id' => 12
            ],
            [
                'name' => 'Produto 12',
                'description' => 'Descrição do Produto 12',
                'image' => 'produto_sem_imagem.jpg',
                'quantity' => 12,
                'cost_price' => 120,
                'sales_price' => 240,
                'status' => 'A'
            ]
        );
        Product::withTrashed()->updateOrCreate(
            [
                'id' => 13
            ],
            [
                'name' => 'Produto 13',
                'description' => 'Descrição do Produto 13',
                'image' => 'produto_sem_imagem.jpg',
                'quantity' => 13,
                'cost_price' => 130,
                'sales_price' => 260,
                'status' => 'A'
            ]
        );
    }
}
