<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * FlightTravelDeals Model
 *
 * @property \App\Model\Table\FlightsTable&\Cake\ORM\Association\BelongsTo $Flights
 * @property \App\Model\Table\TravelDealsTable&\Cake\ORM\Association\BelongsTo $TravelDeals
 *
 * @method \App\Model\Entity\FlightTravelDeal newEmptyEntity()
 * @method \App\Model\Entity\FlightTravelDeal newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\FlightTravelDeal> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\FlightTravelDeal get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\FlightTravelDeal findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\FlightTravelDeal patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\FlightTravelDeal> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\FlightTravelDeal|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\FlightTravelDeal saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\FlightTravelDeal>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FlightTravelDeal>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FlightTravelDeal>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FlightTravelDeal> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FlightTravelDeal>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FlightTravelDeal>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\FlightTravelDeal>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\FlightTravelDeal> deleteManyOrFail(iterable $entities, array $options = [])
 */
class FlightTravelDealsTable extends Table
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

        $this->setTable('flight_travel_deals');
        $this->setDisplayField(['flight_id', 'travel_deal_id']);
        $this->setPrimaryKey(['flight_id', 'travel_deal_id']);

        $this->belongsTo('Flights', [
            'foreignKey' => 'flight_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('TravelDeals', [
            'foreignKey' => 'travel_deal_id',
            'joinType' => 'INNER',
        ]);
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
        $rules->add($rules->existsIn(['flight_id'], 'Flights'), ['errorField' => 'flight_id']);
        $rules->add($rules->existsIn(['travel_deal_id'], 'TravelDeals'), ['errorField' => 'travel_deal_id']);

        return $rules;
    }
}
