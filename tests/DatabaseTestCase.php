<?php

namespace Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;

class DatabaseTestCase extends TestCase
{
    use RefreshDatabase;

    /**
     * Check the HasMany relationship.
     *
     * @param string $targetClass
     * @param string $relatedClass
     * @param string $relationshipName
     */
    protected function assertHasMany($targetClass, $relatedClass, $relationshipName)
    {
        $targetEntity = factory($targetClass)->create();
        $relatedEntity = factory($relatedClass)->create();
        $targetEntity->$relationshipName()->save($relatedEntity);

        $this->assertEquals($relatedEntity->fresh(), $targetEntity->$relationshipName()->first());
    }

    /**
     * Check the BelongsTo relationship.
     *
     * @param string $targetClass
     * @param string $relatedClass
     * @param string $relationshipName
     */
    protected function assertBelongsTo($targetClass, $relatedClass, $relationshipName)
    {
        $targetEntity = factory($targetClass)->create();
        $relatedEntity = factory($relatedClass)->create();
        $targetEntity->$relationshipName()->associate($relatedEntity);
        $targetEntity->save();

        $this->assertEquals($relatedEntity->fresh(), $targetEntity->fresh()->$relationshipName);
    }
}
