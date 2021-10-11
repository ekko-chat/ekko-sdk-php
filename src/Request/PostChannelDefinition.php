<?php

namespace Ekko\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * PostChannelDefinition
 *
 * @author Jonathan Martin <jonathan@ekoha.co>
 */
class PostChannelDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'POST';
    }

    public function getBaseUrl()
    {
        return '/rooms';
    }

    public function getBody()
    {
        $options = $this->getOptions();
        return array(
            'room_id' => $options['room_id'],
            'private' => $options['private'],
            'distinct' => $options['distinct'],
            'name' => isset($options['name']) ? $options['name'] : null,
            'users_ids' => isset($options['users_ids']) ? $options['users_ids'] : null,
            'custom_type' => isset($options['custom_type']) ? $options['custom_type'] : null,
            'metadatas' => isset($options['metadatas']) ? $options['metadatas'] : null
        );
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined([
            'room_id',
            'private',
            'custom_type',
            'distinct',
            'users_ids',
            'name',
            'metadatas',
        ]);
        $resolver->setAllowedTypes('private', ['bool']);
        $resolver->setAllowedTypes('distinct', ['bool']);
    }
}
