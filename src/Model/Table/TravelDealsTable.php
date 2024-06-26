<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TravelDeals Model
 *
 * @property \App\Model\Table\InsurancesTable&\Cake\ORM\Association\BelongsTo $Insurances
 * @property \App\Model\Table\HotelsTable&\Cake\ORM\Association\BelongsTo $Hotels
 * @property \App\Model\Table\CarRentalsTable&\Cake\ORM\Association\BelongsTo $CarRentals
 * @property \App\Model\Table\TranslationsTable&\Cake\ORM\Association\BelongsTo $Translations
 * @property \App\Model\Table\FlightsTable&\Cake\ORM\Association\BelongsToMany $Flights
 *
 * @method \App\Model\Entity\TravelDeal newEmptyEntity()
 * @method \App\Model\Entity\TravelDeal newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\TravelDeal> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TravelDeal get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\TravelDeal findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\TravelDeal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\TravelDeal> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TravelDeal|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\TravelDeal saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\TravelDeal>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TravelDeal>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TravelDeal>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TravelDeal> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TravelDeal>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TravelDeal>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\TravelDeal>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\TravelDeal> deleteManyOrFail(iterable $entities, array $options = [])
 */
class TravelDealsTable extends Table
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

        $this->setTable('travel_deals');
        $this->setDisplayField('description');
        $this->setPrimaryKey('id');

        $this->belongsTo('Insurances', [
            'foreignKey' => 'insurance_id',
        ]);
        $this->belongsTo('Hotels', [
            'foreignKey' => 'hotel_id',
        ]);
        $this->belongsTo('Cruises', [
            'foreignKey' => 'cruise_id',
        ]);
        $this->belongsTo('CarRentals', [
            'foreignKey' => 'car_rental_id',
        ]);
        $this->belongsTo('Translations', [
            'foreignKey' => 'translation_id',
        ]);
        $this->hasMany('Bookings', [
            'foreignKey' => 'travel_deal_id',
        ]);
        $this->belongsToMany('Flights', [
            'foreignKey' => 'travel_deal_id',
            'targetForeignKey' => 'flight_id',
            'joinTable' => 'flights_travel_deals',
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
            ->date('start_date')
            ->allowEmptyDate('start_date');

        $validator
            ->date('end_date')
            ->allowEmptyDate('end_date');

        $validator
            ->scalar('description')
            ->maxLength('description', 50)
            ->allowEmptyString('description');

        $validator
            ->decimal('total_price')
            ->allowEmptyString('total_price');

        $validator
            ->integer('insurance_id')
            ->allowEmptyString('insurance_id');

        $validator
            ->integer('hotel_id')
            ->allowEmptyString('hotel_id');

        $validator
            ->integer('cruise_id')
            ->allowEmptyString('cruise_id');

        $validator
            ->integer('car_rental_id')
            ->allowEmptyString('car_rental_id');

        $validator
            ->integer('translation_id')
            ->allowEmptyString('translation_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['insurance_id'], 'Insurances'), ['errorField' => 'insurance_id']);
        $rules->add($rules->existsIn(['hotel_id'], 'Hotels'), ['errorField' => 'hotel_id']);
        $rules->add($rules->existsIn(['cruise_id'], 'Cruises'), ['errorField' => 'cruise_id']);
        $rules->add($rules->existsIn(['car_rental_id'], 'CarRentals'), ['errorField' => 'car_rental_id']);
        $rules->add($rules->existsIn(['translation_id'], 'Translations'), ['errorField' => 'translation_id']);

        return $rules;
    }
}
