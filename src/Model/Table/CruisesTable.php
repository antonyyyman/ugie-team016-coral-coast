<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cruises Model
 *
 * @property \App\Model\Table\TravelDealsTable&\Cake\ORM\Association\HasMany $TravelDeals
 *
 * @method \App\Model\Entity\Cruise newEmptyEntity()
 * @method \App\Model\Entity\Cruise newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Cruise> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cruise get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Cruise findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Cruise patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Cruise> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cruise|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Cruise saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Cruise>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cruise>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cruise>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cruise> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cruise>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cruise>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Cruise>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Cruise> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CruisesTable extends Table
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

        $this->setTable('cruises');
        $this->setDisplayField('description');
        $this->setPrimaryKey('id');

        $this->hasMany('TravelDeals', [
            'foreignKey' => 'cruise_id',
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
            ->decimal('price')
            ->allowEmptyString('price');

        return $validator;
    }
}
