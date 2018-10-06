<?php

use Illuminate\Database\Seeder;

use App\User;
use App\UserSocial;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
        	[
        		'first_name' => 'Jenny',
        		'last_name' => 'Sia',
        		'username' => 'mattiyahu19',
                'email' => 'matthew@praxxys.ph',
        	]
        ];

        \DB::beginTransaction();

        foreach ($users as $vars) {
        	$user = User::where('username', $vars['username'])->first();

        	if (!$user) {
	        	$vars['password'] = Hash::make('password');
	        	$user = User::create($vars);
        	}

            $array = ['main', 'intro', 'work', 'about', 'contact', 'settings'];

            foreach ($array as $value) {
            /* Short circuit if any relationship is missing */
                if (!$user->$value) {
                    $function = 'get' . ucwords($value);
                    $user->$value()->create($this->$function());
                }
            }

            if (!count($user->socials)) {
                foreach ($this->getSocials() as $key => $social) {
                    $user->socials()->create($social);
                }
            }
        }

        \DB::commit();
    }

    private function getMain() {
        return [
            'header' => 'Jenny Sia',
            'content' => '<p>Amazing. Beautiful. Simplicity.</p>',
        ];
    }

    private function getIntro() {
    	return [
    		'tab_label' => 'Intro',
    		'header' => 'Intro',
    		'content' => "<p>I am a teacher. It's how I define myself. A good teacher isn't someone who gives the answers out to their kids but is understanding of needs and challenges and gives tools to help other people succeed. That's the way I see myself, so whatever it is that I will do eventually after politics, it'll have to do a lot with teaching. - Justin Trudeau</p>",
    	];
    }

    private function getWork() {
    	return [
    		'tab_label' => 'Work',
    		'header' => 'Work',
    		'content' => "<p>Teaching is a very noble profession that shapes the character, caliber, and future of an individual. If the people remember me as a good teacher, that will be the biggest honour for me. - A. P. J. Abdul Kalam</p>",
    	];
    }

    private function getAbout() {
    	return [
    		'tab_label' => 'About',
    		'header' => 'About',
    		'content' => '<p>I have learned that, although I am a good teacher, I am a much better student, and I was blessed to learn valuable lessons from my students on a daily basis. They taught me the importance of teaching to a student - and not to a test. - Erin Gruwell</p>',
    	];
    }

    private function getContact() {
        return [
            'tab_label' => 'Contact',
            'header' => 'Contact',
        ];
    }

    private function getSocials() {
    	return [
    		['url' => 'https://web.facebook.com/jenny.sia.399', 'type' => UserSocial::FACEBOOK],
    		['url' => 'https://twitter.com', 'type' => UserSocial::TWITTER],
    		['url' => 'https://www.instagram.com/jensiadel', 'type' => UserSocial::INSTAGRAM],
    	];
    }

    private function getSettings() {
        return [
            'og_title' => 'Portfolio | Jenny Sia',
            'og_description' => "I am a teacher. It's how I define myself. A good teacher isn't someone who gives the answers out to their kids but is understanding of needs and challenges and gives tools to help other people succeed. That's the way I see myself, so whatever it is that I will do eventually after politics, it'll have to do a lot with teaching. - Justin Trudeau",
        ];
    }
}
