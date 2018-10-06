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

            if (!$user->main) {
                $user->main()->create($this->getMain());
            }

        	if (!$user->intro) {
	        	$user->intro()->create($this->getIntro());
        	}

        	if (!$user->work) {
	        	$user->work()->create($this->getWork());
        	}

        	if (!$user->about) {
	        	$user->about()->create($this->getAbout());
        	}

            if (!$user->contact) {
                $user->contact()->create($this->getContact());
            }

            if (!$user->settings) {
                $user->settings()->create();
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
            'content' => '<p>A fully responsive site template designed by <a href="https://html5up.net">HTML5 UP</a> and released<br /> for free under the <a href="https://html5up.net/license">Creative Commons</a> license.</p>',
        ];
    }

    private function getIntro() {
    	return [
    		'tab_label' => 'Intro',
    		'header' => 'Intro',
    		'content' => '<p>Aenean ornare velit lacus, ac varius enim ullamcorper eu. Proin aliquam facilisis ante interdum congue. Integer mollis, nisl amet convallis, porttitor magna ullamcorper, amet egestas mauris. Ut magna finibus nisi nec lacinia. Nam maximus erat id euismod egestas. By the way, check out my <a href="#work">awesome work</a>.</p> <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis dapibus rutrum facilisis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Etiam tristique libero eu nibh porttitor fermentum. Nullam venenatis erat id vehicula viverra. Nunc ultrices eros ut ultricies condimentum. Mauris risus lacus, blandit sit amet venenatis non, bibendum vitae dolor. Nunc lorem mauris, fringilla in aliquam at, euismod in lectus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. In non lorem sit amet elit placerat maximus. Pellentesque aliquam maximus risus, vel sed vehicula.</p>',
    	];
    }

    private function getWork() {
    	return [
    		'tab_label' => 'Work',
    		'header' => 'Work',
    		'content' => '<p>Adipiscing magna sed dolor elit. Praesent eleifend dignissim arcu, at eleifend sapien imperdiet ac. Aliquam erat volutpat. Praesent urna nisi, fringila lorem et vehicula lacinia quam. Integer sollicitudin mauris nec lorem luctus ultrices.</p> <p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus pharetra. Pellentesque condimentum sem. In efficitur ligula tate urna. Maecenas laoreet massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus amet feugiat tempus.</p>',
    	];
    }

    private function getAbout() {
    	return [
    		'tab_label' => 'About',
    		'header' => 'About',
    		'content' => '<p>Lorem ipsum dolor sit amet, consectetur et adipiscing elit. Praesent eleifend dignissim arcu, at eleifend sapien imperdiet ac. Aliquam erat volutpat. Praesent urna nisi, fringila lorem et vehicula lacinia quam. Integer sollicitudin mauris nec lorem luctus ultrices. Aliquam libero et malesuada fames ac ante ipsum primis in faucibus. Cras viverra ligula sit amet ex mollis mattis lorem ipsum dolor sit amet.</p>',
    	];
    }

    private function getContact() {
        return [
            'tab_label' => 'Contact',
            'header' => 'Contact',
            'content' => '<p>Lorem ipsum dolor sit amet, consectetur et adipiscing elit. Praesent eleifend dignissim arcu, at eleifend sapien imperdiet ac. Aliquam erat volutpat. Praesent urna nisi, fringila lorem et vehicula lacinia quam. Integer sollicitudin mauris nec lorem luctus ultrices. Aliquam libero et malesuada fames ac ante ipsum primis in faucibus. Cras viverra ligula sit amet ex mollis mattis lorem ipsum dolor sit amet.</p>',
        ];
    }

    private function getSocials() {
    	return [
    		['url' => 'https://facebook.com', 'type' => UserSocial::FACEBOOK],
    		['url' => 'https://twitter.com', 'type' => UserSocial::TWITTER],
    		['url' => 'https://instagram.com', 'type' => UserSocial::INSTAGRAM],
    	];
    }
}
