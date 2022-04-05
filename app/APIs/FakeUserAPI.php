<?php
namespace App\APIs;

use App\Contracts\AuthUserAPI;
use Faker\Factory;

class FakeUserAPI implements AuthUserAPI
{
    public function getUser($login)
    {
        $faker = Factory::create();
        $user['org_id'] = $faker->numerify('100#####');
        $user['name'] = $faker->name();
        $user['remark'] = 'เจ้าหน้าที่';
        $user['name_en'] = '';
        $user['email'] = $login.'@employee.mahidol.ac.th';

        return $user;
    }
    public function authenticate($login, $password)
    {
        return $login !== $password ?
                ['reply_code' => 1, 'reply_text' => 'credentials not found in our records'] :
                $this->getUser($login);
    }

}