<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
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
        // \App\Models\User::factory(5)->create();

        $user = User::factory()->create(
            [
                'name' => 'John Doe',
                'email' => 'john@gmail.com'
            ]
            );

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);
        // Listing::create([
        //     'title' => 'Laravel Senior Developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corp',
        //     'location' => 'Boston, MA',
        //     'email' => 'email@email.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rhoncus accumsan fermentum. Aliquam ac venenatis nisl. Integer ullamcorper ligula vel finibus interdum. Nam suscipit sodales sem eget accumsan. Sed at nisi orci. Mauris interdum euismod mi, vel iaculis mi efficitur a. Nunc sit amet mi tortor. Duis quis volutpat metus. Phasellus id ante euismod turpis condimentum finibus sed at ante. Donec sed rutrum nisl. Nullam ut augue nisi. Vivamus non facilisis nisi. Nunc pellentesque, diam ac porta ultricies, ligula erat accumsan arcu, nec aliquam sem tortor gravida elit. Etiam vehicula non mi et elementum. Curabitur et laoreet ipsum. Suspendisse potenti.'
        // ]);   
        
        // Listing::create([
        //     'title' => 'Full-Stack Engineer',
        //     'tags' => 'laravel, backend, api',
        //     'company' => 'Stark Industries',
        //     'location' => 'New York, NY',
        //     'email' => 'email2@email.com',
        //     'website' => 'https://www.starkindustries.com',
        //     'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rhoncus accumsan fermentum. Aliquam ac venenatis nisl. Integer ullamcorper ligula vel finibus interdum. Nam suscipit sodales sem eget accumsan. Sed at nisi orci. Mauris interdum euismod mi, vel iaculis mi efficitur a. Nunc sit amet mi tortor. Duis quis volutpat metus. Phasellus id ante euismod turpis condimentum finibus sed at ante. Donec sed rutrum nisl. Nullam ut augue nisi. Vivamus non facilisis nisi. Nunc pellentesque, diam ac porta ultricies, ligula erat accumsan arcu, nec aliquam sem tortor gravida elit. Etiam vehicula non mi et elementum. Curabitur et laoreet ipsum. Suspendisse potenti.'
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}