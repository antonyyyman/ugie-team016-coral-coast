<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Hotels Model
 *
 * @property \App\Model\Table\BookingsTable&\Cake\ORM\Association\HasMany $Bookings
 * @property \App\Model\Table\TravelDealsTable&\Cake\ORM\Association\HasMany $TravelDeals
 *
 * @method \App\Model\Entity\Hotel newEmptyEntity()
 * @method \App\Model\Entity\Hotel newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Hotel> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Hotel get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Hotel findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Hotel patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Hotel> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Hotel|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Hotel saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Hotel>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Hotel>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Hotel>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Hotel> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Hotel>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Hotel>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Hotel>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Hotel> deleteManyOrFail(iterable $entities, array $options = [])
 */
class HotelsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('hotels');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Bookings', [
            'foreignKey' => 'hotel_id',
        ]);
        $this->hasMany('TravelDeals', [
            'foreignKey' => 'hotel_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->allowEmptyString('name');

        $validator
            ->scalar('location')
            ->maxLength('location', 50)
            ->allowEmptyString('location');

        $validator
            ->scalar('telephone')
            ->maxLength('telephone', 50)
            ->allowEmptyString('telephone');

        $validator
            ->decimal('price')
            ->allowEmptyString('price');

        return $validator;
    }
}
