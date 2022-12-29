<?php

namespace Modules\Share\Tests\Feature;

use App\Models\Content\PostCategory;
use App\Models\User;
use App\Models\User\Permission;
use Database\Seeders\admin\PermissionsSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use PhpOffice\PhpSpreadsheet\Calculation\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * Test admin user can see category index page.
     *
     * @return void
     */
    public function test_admin_user_can_see_category_index_page(): void
    {
        $this->callSeeder();
        $this->createUserWithLogin();
        $this->givePermission();

        $response = $this->get(route('admin.content.category.index'));
        $response->assertViewIs('admin.content.category.index');
        $response->assertViewHas('categories');
    }

    /**
     * Test guest user can not see category index page.
     *
     * @return void
     */
    public function test_guest_user_not_can_see_category_index_page(): void
    {
        $this->callSeeder();
        $this->createUserWithLogin();

        $this->get(route('admin.content.category.index'))->assertStatus(403);
    }

    /**
     * Test admin user can see category create page.
     *
     * @return void
     */
    public function test_admin_user_can_see_category_create_page(): void
    {
        $this->callSeeder();
        $this->createUserWithLogin();
        $this->givePermission();

        $response = $this->get(route('admin.content.category.create'));
        $response->assertViewIs('admin.content.category.create');
        $response->assertViewHas('categories');
    }

    /**
     * Test guest user can not see category create page.
     *
     * @return void
     */
    public function test_guest_user_not_can_see_category_create_page(): void
    {
        $this->callSeeder();
        $this->createUserWithLogin();

        $this->get(route('admin.content.category.create'))->assertStatus(403);
    }

    /**
     * Test admin user can store new category.
     *
     * @test
     * @return void
     */
    public function admin_user_can_store_new_category(): void
    {
        $this->callSeeder();
        $this->createUserWithLogin();
        $this->givePermission();

        $title = $this->faker->title;
        $response = $this->post(route('admin.content.category.store'), [
            'parent_id' => null,
            'title' => $title,
            'keywords' => $this->faker->name,
            'description' => $this->faker->text,
            'status' => PostCategory::STATUS_ACTIVE,
        ]);
        $response->assertRedirect(route('admin.content.category.index'));
        $response->assertSessionHas('swal-success');

        $this->assertDatabaseCount('post_categories', 1);
        $this->assertDatabaseHas('post_categories', ['title' => $title]);
        $this->assertEquals(1, PostCategory::query()->count());
    }

    /**
     * Test guest user can not store new category.
     *
     * @test
     * @return void
     */
    public function guest_user_can_not_store_new_category(): void
    {
        $this->callSeeder();
        $this->createUserWithLogin();

        $title = $this->faker->title;
        $response = $this->post(route('admin.content.category.store'), [
            'parent_id' => null,
            'title' => $title,
            'keywords' => $this->faker->name,
            'description' => $this->faker->text,
            'status' => PostCategory::STATUS_ACTIVE,
        ]);
        $response->assertStatus(403);
        $response->assertSessionMissing('success_message');

        $this->assertDatabaseCount('categories', 0);
        $this->assertDatabaseMissing('categories', ['title' => $title]);
        $this->assertEquals(0, PostCategory::query()->count());
    }

    # Private methods

    /**
     * Create user & login.
     *
     * @return void
     */
    private function createUserWithLogin(): void
    {
        auth()->login(User::factory()->create());
    }

    /**
     * Give permission to user.
     *
     * @return void
     */
    private function givePermission(): void
    {
        $permission = Permission::query()->where('name', Permission::PERMISSION_POST_CATEGORIES['name'])->get();
        auth()->user()->givePermissionTo($permission);
    }

    /**
     * Call seeder.
     *
     * @return void
     */
    private function callSeeder(): void
    {
        $this->seed(PermissionsSeeder::class);
    }
}
