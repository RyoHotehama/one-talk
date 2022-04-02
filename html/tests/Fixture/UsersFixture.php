<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'username' => 'Lorem ipsum dolor sit amet',
                'email' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'title' => 'Lorem ipsum dolor sit amet',
                'image_1' => 'Lorem ipsum dolor sit amet',
                'image_2' => 'Lorem ipsum dolor sit amet',
                'image_3' => 'Lorem ipsum dolor sit amet',
                'image_4' => 'Lorem ipsum dolor sit amet',
                'image_5' => 'Lorem ipsum dolor sit amet',
                'role' => 1,
                'del_flg' => 1,
                'created' => '2022-04-02 14:43:43',
                'updated' => '2022-04-02 14:43:43',
            ],
        ];
        parent::init();
    }
}
