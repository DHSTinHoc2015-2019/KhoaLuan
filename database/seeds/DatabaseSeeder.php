<?php

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
        $this->call(UsersTableSeeder::class);
        $this->call(HomeTpackTableSeeder::class);
        $this->call(IntroductionTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(BlogTableSeeder::class);
        $this->call(DiscussionTypeTableSeeder::class);
        $this->call(DiscussionTableSeeder::class);
        $this->call(CommentDiscussionTableSeeder::class);
        $this->call(CommentDiscussionDetailTableSeeder::class);
        $this->call(CommentBlogTableSeeder::class);
        $this->call(CommentDetailBlogTableSeeder::class);
        $this->call(LibraryTypeTableSeedeer::class);
        $this->call(LibraryTableSeedeer::class);
        $this->call(ContactTableSeedeer::class);
    }
}
