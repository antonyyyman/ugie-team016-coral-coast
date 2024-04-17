<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Insurances Model
 *
 * @property \App\Model\Table\BookingsTable&\Cake\ORM\Association\HasMany $Bookings
 * @property \App\Model\Table\TravelDealsTable&\Cake\ORM\Association\HasMany $TravelDeals
 *
 * @method \App\Model\Entity\Insurance newEmptyEntity()
 * @method \App\Model\Entity\Insurance newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Insurance> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Insurance get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Insurance findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Insurance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Insurance> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Insurance|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Insurance saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Insurance>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Insurance>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Insurance>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Insurance> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Insurance>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Insurance>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Insurance>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Insurance> deleteManyOrFail(iterable $entities, array $options = [])
 */
class InsurancesTable extends Table
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

        $this->setTable('insurances');
        $this->setDisplayField('supplier');
        $this->setPrimaryKey('id');

        $this->hasMany('Bookings', [
            'foreignKey' => 'insurance_id',
        ]);
        $this->hasMany('TravelDeals', [
            'foreignKey' => 'insurance_id',
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
            ->scalar('supplier')
            ->maxLength('supplier', 50)
            ->allowEmptyString('supplier');

        $validator
            ->scalar('level')
            ->maxLength('level', 50)
            ->allowEmptyString('level');

        $validator
            ->scalar('description')
            ->maxLength('description', 50)
            ->allowEmptyString('description');

        $validator
            ->decimal('price')
            ->allowEmptyString('price');

        return $validator;
    }
}
