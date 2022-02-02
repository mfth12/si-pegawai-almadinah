<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'Miftah',
            'email' => 'ciftah@gmail.com',
            'password' => bcrypt(12345)
        ]); 
        
        User::create([
            'name' => 'Euis Latifah',
            'email' => 'deis@gmail.com',
            'password' => bcrypt(99979)
        ]); 

        Kategori::create([
            'nama' => 'Web Programming',
            'slug' => 'web-programming'
        ]); 

        Kategori::create([
            'nama' => 'Sains',
            'slug' => 'sains'
        ]); 

        Kategori::create([
            'nama' => 'Personal',
            'slug' => 'personal'
        ]); 

        Post::create([
            'title' => 'Project Ke Bulan',
            'kateg_id' => '54',
            'user_id' => '1',
            'slug' => 'project-ke-bulan',
            'excerpt' => 'Lorem ipsumm553',
            'body' => 'Necessitatibus facilis deleniti eaque, ratione perspiciatis minima laboriosam magnam praesentium, omnis ipsam possimus non dignissimos voluptatem accusamus debitis sunt tempore atque! Commodi dolor a corrupti ut x tempore, quae deleniti maiores officiis doloribus corporis eum ipsa cum, in, autem dolor? Natus illo id aut alias et officia in aspernatur ducimus ab placeat ',
        ]);

        Post::create([
            'title' => 'Dasar Pemrograman',
            'kateg_id' => '54',
            'user_id' => '2',
            'slug' => 'dasar-pemrograman',
            'excerpt' => 'Maxime nulla obcaecati quae! Placeat sequi.',
            'body' => '<p>Nobis qui rem, blanditiis libero tencitationem alias accusamus debitis e officiis totam adipisci sed expedita.</p><p>iste debitis, hic dolorem dolores eveniet laboriosam mollitia nulla facere ut corrupti! Aperiam voluptas rerum nisi doloremque a, sapiente nostrum veritatis quis minima illum excepturi neque blanditiis distinctio fugit nesciunt temporibus aliquid at repellendis reprehenderit at quis totam ducimus inventore dolore cum possimus. Aliquid nihil animi iste! Voluptates, quas maxime? Voluptatum dignissimos omnis vitae nostrum optio tempore magnam.</p><p> Necessitatibus facilis deleniti eaque, ratione perspiciatis minima laboriosam magnam praesentium, omnis ipsam possimus non dignissimos voluptatem accusamus debitis sunt tempore atque! Commodi dolor a corrupti ut x tempore, quae deleniti maiores officiis doloribus corporis eum ipsa cum, in, autem dolor? Natus illo id aut alias et officia in aspernatur ducimus ab placeat.</p>'
        ]);

        Post::create([
            'title' => 'Liburan ke Bali',
            'kateg_id' => '56',
            'user_id' => '1',
            'slug' => 'liburan-ke-bali',
            'excerpt' => 'Hayuk jalan-jalan ke Bali',
            'body' => '<p>Necessitatibus facilis deleniti eaque, ratione perspiciatis minima laboriosam magnam praesentium, omnis ipsam possimus non dignissimos voluptatem accusamus debitis sunt tempore atque! Commodi dolor a corrupti ut x tempore, quae deleniti maiores officiis doloribus corporis eum ipsa cum, in, autem dolor? Natus illo id aut alias et officia in aspernatur ducimus ab placeat</p><p>iste debitis, hic dolorem dolores eveniet laboriosam mollitia nulla facere ut corrupti! Aperiam voluptas rerum nisi doloremque a, sapiente nostrum veritatis quis minima illum excepturi neque blanditiis distinctio fugit nesciunt temporibus aliquid at repellendis reprehenderit at quis totam ducimus inventore dolore cum possimus. Aliquid nihil animi iste! Voluptates, quas maxime? Voluptatum dignissimos omnis vitae nostrum optio tempore magnam.</p><p> Necessitatibus facilis deleniti eaque, ratione perspiciatis minima laboriosam magnam praesentium, omnis ipsam possimus non dignissimos voluptatem accusamus debitis sunt tempore atque! Commodi dolor a corrupti ut x tempore, quae deleniti maiores officiis doloribus corporis eum ipsa cum, in, autem dolor? Natus illo id aut alias et officia in aspernatur ducimus ab placeat.</p> ',
        ]);
        
        Post::create([
            'title' => 'Liburan ke Lombok',
            'kateg_id' => '56',
            'user_id' => '2',
            'slug' => 'liburan-ke-lombok',
            'excerpt' => 'Hayuk jalan-jalan ke Lombok',
            'body' => '<p>Necessitatibus facilis dgnam praesentium, omnis ipsam possimus non dignissimos voluptatem accusamus debitis sunt tempore atque! Commodi dolor a corrupti ut x tempore, quae deleniti maiores officiis doloribus corporis eum ipsa cum, in, autem dolor? Natus illo id aut alias et officia in aspernatur ducimus ab placeat</p><p>iste debitis, hic dolorem dolores eveniet laboriosam mollitia nulla facere ut corrupti! Aperiam voluptas rerum nisi doloremque a, sapiente nostrum veritatis quis minima illum excepturi neque blanditiis distinctio fugit nesciunt temporibus aliquid at repellendis reprehenderit at quis totam ducimus inventore dolore cum possimus. Aliquid nihil animi iste! Voluptates, quas maxime? Voluptatum dignissimos omnis vitae nostrum optio tempore magnam.</p><p> Necessitatibus facilis deleniti eaque, ratione perspiciatis minima laboriosam magnam praesentium, omnis ipsam possimus non dignissimos voluptatem accusamus debitis sunt tempore atque! Commodi dolor a corrupti ut x tempore, quae deleniti maiores officiis doloribus corporis eum ipsa cum, in, autem dolor? Natus illo id aut alias et officia in aspernatur ducimus ab placeat.</p> ',
        ]);
        
        Post::create([
            'title' => 'Project Laravel Terbaru',
            'kateg_id' => '54',
            'user_id' => '1',
            'slug' => 'project-laravel-terbaru',
            'excerpt' => 'Belajar membuat project aplikasi menggunakan framework laravel merupakan hal yang menyenangkan.',
            'body' => '<p>Disini tidak ada yang bertanya tentang necessitatibus facilis dgnam praesentium, omnis ipsam possimus non dignissimos voluptatem accusamus debitis sunt tempore atque! Commodi dolor a corrupti ut x tempore, quae deleniti maiores officiis doloribus corporis eum ipsa cum, in, autem dolor? Natus illo id aut alias et officia in aspernatur ducimus ab placeat</p><p>iste debitis, hic dolorem dolores eveniet laboriosam mollitia nulla facere ut corrupti! Aperiam voluptas rerum nisi doloremque a, sapiente nostrum veritatis quis minima illum excepturi neque blanditiis distinctio fugit nesciunt temporibus aliquid at repellendis reprehenderit at quis totam ducimus inventore dolore cum possimus. Aliquid nihil animi iste! Voluptates, quas maxime? Voluptatum dignissimos omnis vitae nostrum optio tempore magnam.</p><p> Necessitatibus facilis deleniti eaque, ratione perspiciatis minima laboriosam magnam praesentium, omnis ipsam possimus non dignissimos voluptatem accusamus debitis sunt tempore atque! Commodi dolor a corrupti ut x tempore, quae deleniti maiores officiis doloribus corporis eum ipsa cum, in, autem dolor? Natus illo id aut alias et officia in aspernatur ducimus ab placeat.</p> ',
        ]);
    }
}
