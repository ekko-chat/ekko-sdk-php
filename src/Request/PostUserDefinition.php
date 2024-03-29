<?php

namespace Ekko\Request;

use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * PostUserDefinition
 *
 * @author Jonathan Martin <jonathan@ekoha.co>
 */
class PostUserDefinition extends AbstractRequestDefinition
{
    public function getMethod()
    {
        return 'POST';
    }

    public function getBaseUrl()
    {
        return '/user';
    }

    public function getBody()
    {
        $options = $this->getOptions();
        return array(
            'user_id' => $options['user_id'],
            'username' => $options['username'],
            'image_url' => isset($options['image_url']) ? $options['image_url'] : null,
            'issue_access_token' => isset($options['issue_access_token']) ? $options['issue_access_token'] : false,
            'force_access_token' => isset($options['force_access_token']) ? $options['force_access_token'] : null,
            'metadatas' => isset($options['metadatas']) ? $options['metadatas'] : []
        );
    }

    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefined([
            'user_id',
            'username',
            'image_url',
            'issue_access_token',
            'force_access_token',
            'metadatas'
        ]);
        $resolver->setAllowedTypes('issue_access_token', ['bool']);
        $resolver->setRequired(['user_id', 'username', 'image_url']);
    }
}
