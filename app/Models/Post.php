<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Post
{
    private static $blog_post = [
        [
            "title" => "Project Nuklir Statis",
            "slug" => "judul-pertama-99957",
            "author" => "Miftahul",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores blanditiis fugiat voluptatibus quas eum magnam neque delectus ut quod soluta officiis deserunt, molestias fuga laudantium, dolorem at. Ipsam pariatur cumque necessitatibus molestias qui dicta. Ut culpa minus error exercitationem sunt, itaque eius unde nulla optio necessitatibus. Sit illo et non possimus esse doloribus eos commodi enim voluptas animi repudiandae nobis molestias veritatis iusto voluptates deleniti sunt aut vel eveniet, fugiat repellendus ullam ducimus magnam voluptatum. Beatae unde reprehenderit quas itaque."
        ],
        [
            "title" => "Projects Ke Dua",
            "slug" => "judul-kedua-99964",
            "author" => "Euis Latifah",
            "body" => "Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aperiam accusamus, fuga voluptates numquam quod perferendis earum porro quaerat asperiores illum. Voluptatibus, molestiae? In ea eveniet facilis aperiam quidem iusto esse magni rem sunt excepturi? Explicabo praesentium consequatur maiores labore provident, accusamus velit ea iusto et quod minus culpa error, ab fugiat sint totam eaque inventore ex fugit. Quam corporis odio fuga provident excepturi cum aliquid exercitationem quo nobis, odit nostrum necessitatibus illum, minus omnis doloribus blanditiis nesciunt quos distinctio molestias qui consequuntur. Porro veniam nam alias aliquid assumenda ipsa qui, nihil minima impedit fuga dolore sit recusandae, a corrupti harum numquam libero. Repellat ratione eaque rem! Distinctio exercitationem iste possimus!"
        ]
    ];

    public static function all()
    {
        return collect(self::$blog_post);
    }

    public static function find($slug)
    {
        $posts = static::all();
        // $post = [];
        // foreach ($posts as $cari) {
        //     if ($cari["slug"] === $slug) {
        //         $post = $cari;
        //     }
        // };
        return $posts->firstWhere('slug', $slug);
    }
}
