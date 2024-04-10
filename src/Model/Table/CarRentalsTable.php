<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * CarRentals Model
 *
 * @property \App\Model\Table\BookingsTable&\Cake\ORM\Association\HasMany $Bookings
 * @property \App\Model\Table\TravelDealsTable&\Cake\ORM\Association\HasMany $TravelDeals
 *
 * @method \App\Model\Entity\CarRental newEmptyEntity()
 * @method \App\Model\Entity\CarRental newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\CarRental> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\CarRental get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\CarRental findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\CarRental patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\CarRental> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\CarRental|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\CarRental saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\CarRental>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CarRental>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CarRental>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CarRental> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CarRental>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CarRental>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\CarRental>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\CarRental> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CarRentalsTable extends Table
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

        $this->setTable('car_rentals');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Bookings', [
            'foreignKey' => 'car_rental_id',
        ]);
        $this->hasMany('TravelDeals', [
            'foreignKey' => 'car_rental_id',
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
            ->scalar('company')
            ->maxLength('company', 50)
            ->allowEmptyString('company');

        $validator
            ->scalar('description')
            ->maxLength('description', 50)
            ->allowEmptyString('description');

        $validator
            ->scalar('plate')
            ->maxLength('plate', 50)
            ->allowEmptyString('plate');

        $validator
            ->scalar('brand')
            ->maxLength('brand', 50)
            ->allowEmptyString('brand');

        $validator
            ->decimal('price')
            ->allowEmptyString('price');

        return $validator;
    }
}
