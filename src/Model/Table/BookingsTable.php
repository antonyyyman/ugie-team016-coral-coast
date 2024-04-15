<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bookings Model
 *
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\PaymentsTable&\Cake\ORM\Association\BelongsTo $Payments
 * @property \App\Model\Table\InsurancesTable&\Cake\ORM\Association\BelongsTo $Insurances
 * @property \App\Model\Table\HotelsTable&\Cake\ORM\Association\BelongsTo $Hotels
 * @property \App\Model\Table\CarRentalsTable&\Cake\ORM\Association\BelongsTo $CarRentals
 * @property \App\Model\Table\TranslationsTable&\Cake\ORM\Association\BelongsTo $Translations
 * @property \App\Model\Table\FlightsTable&\Cake\ORM\Association\BelongsTo $Flights
 * @property \App\Model\Table\FlightsTable&\Cake\ORM\Association\BelongsToMany $Flights
 *
 * @method \App\Model\Entity\Booking newEmptyEntity()
 * @method \App\Model\Entity\Booking newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Booking> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Booking get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Booking findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Booking patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Booking> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Booking|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Booking saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Booking>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Booking>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Booking>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Booking> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Booking>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Booking>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Booking>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Booking> deleteManyOrFail(iterable $entities, array $options = [])
 */
class BookingsTable extends Table
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

        $this->setTable('bookings');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
        ]);
        $this->belongsTo('Payments', [
            'foreignKey' => 'payment_id',
        ]);
        $this->belongsTo('Insurances', [
            'foreignKey' => 'insurance_id',
        ]);
        $this->belongsTo('Hotels', [
            'foreignKey' => 'hotel_id',
        ]);
        $this->belongsTo('CarRentals', [
            'foreignKey' => 'car_rental_id',
        ]);
        $this->belongsTo('Translations', [
            'foreignKey' => 'translation_id',
        ]);
        $this->belongsTo('Flights', [
            'foreignKey' => 'flight_id',
        ]);
        $this->belongsToMany('Flights', [
            'foreignKey' => 'booking_id',
            'targetForeignKey' => 'flight_id',
            'joinTable' => 'bookings_flights',
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
            ->integer('user_id')
            ->allowEmptyString('user_id');

        $validator
            ->integer('payment_id')
            ->allowEmptyString('payment_id');

        $validator
            ->date('start_date')
            ->allowEmptyDate('start_date');

        $validator
            ->date('end_date')
            ->allowEmptyDate('end_date');

        $validator
            ->scalar('destination')
            ->maxLength('destination', 50)
            ->allowEmptyString('destination');

        $validator
            ->integer('insurance_id')
            ->allowEmptyString('insurance_id');

        $validator
            ->integer('hotel_id')
            ->allowEmptyString('hotel_id');

        $validator
            ->integer('car_rental_id')
            ->allowEmptyString('car_rental_id');

        $validator
            ->integer('translation_id')
            ->allowEmptyString('translation_id');

        $validator
            ->integer('flight_id')
            ->allowEmptyString('flight_id');

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
        $rules->add($rules->existsIn(['user_id'], 'Users'), ['errorField' => 'user_id']);
        $rules->add($rules->existsIn(['payment_id'], 'Payments'), ['errorField' => 'payment_id']);
        $rules->add($rules->existsIn(['insurance_id'], 'Insurances'), ['errorField' => 'insurance_id']);
        $rules->add($rules->existsIn(['hotel_id'], 'Hotels'), ['errorField' => 'hotel_id']);
        $rules->add($rules->existsIn(['car_rental_id'], 'CarRentals'), ['errorField' => 'car_rental_id']);
        $rules->add($rules->existsIn(['translation_id'], 'Translations'), ['errorField' => 'translation_id']);
        $rules->add($rules->existsIn(['flight_id'], 'Flights'), ['errorField' => 'flight_id']);

        return $rules;
    }
}
