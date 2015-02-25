<?php

class SentryUserGroupSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		DB::table('users_groups')->delete();

		$adminUser = Sentry::getUserProvider()->findByLogin('admin@admin.com');
		$userUser = Sentry::getUserProvider()->findByLogin('user@user.com');
		$starUser = Sentry::getUserProvider()->findByLogin('star@star.com');
		$audienceUser = Sentry::getUserProvider()->findByLogin('audience@audience.com');
		$promoterUser =Sentry::getUserProvider()->findByLogin('promoter@promoter.com');

		$adminGroup = Sentry::getGroupProvider()->findByName('Admins');
		$userGroup = Sentry::getGroupProvider()->findByName('Users');
		$starGroup = Sentry::getGroupProvider()->findByName('Stars');
		$audienceGroup = Sentry::getGroupProvider()->findByName('Audiences');
		$promoterGroup = Sentry::getGroupProvider()->findByName('Promoters');

	    // Assign the groups to the users
	    
	    $adminUser->addGroup($adminGroup);
	    $userUser->addGroup($userGroup);
	    $starUser->addGroup($starGroup);
	    $audienceUser->addGroup($audienceGroup);
	    $promoterUser->addGroup($promoterGroup);
	}

}