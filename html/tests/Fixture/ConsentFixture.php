<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ConsentFixture
 */
class ConsentFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'consent';
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
                'user_id' => 1,
                'your_id' => 1,
                'created' => '2022-04-03 07:15:43',
            ],
        ];
        parent::init();
    }
}
