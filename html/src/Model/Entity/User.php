<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $title
 * @property string|null $image_1
 * @property string|null $image_2
 * @property string|null $image_3
 * @property string|null $image_4
 * @property string|null $image_5
 * @property int $role
 * @property int $del_flg
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $updated
 *
 * @property \App\Model\Entity\Consent[] $consent
 * @property \App\Model\Entity\Petition[] $petition
 * @property \App\Model\Entity\Talk[] $talks
 */
class User extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'username' => true,
        'email' => true,
        'password' => true,
        'title' => true,
        'image_1' => true,
        'image_2' => true,
        'image_3' => true,
        'image_4' => true,
        'image_5' => true,
        'role' => true,
        'del_flg' => true,
        'created' => true,
        'updated' => true,
        'consent' => true,
        'petition' => true,
        'talks' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
}
