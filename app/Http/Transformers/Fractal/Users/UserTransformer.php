<?php

namespace GetCandy\Http\Transformers\Fractal\Users;

use GetCandy\Api\Auth\Models\User;
use League\Fractal\TransformerAbstract;
use GetCandy\Http\Transformers\Fractal\BaseTransformer;
use GetCandy\Http\Transformers\Fractal\Languages\LanguageTransformer;
use GetCandy\Http\Transformers\Fractal\Addresses\AddressTransformer;

class UserTransformer extends BaseTransformer
{
    protected $defaultIncludes = [
        'language'
    ];

    protected $availableIncludes = [
        'store','addresses'
    ];

    public function transform(User $user)
    {
        return [
            'id' => $user->encodedId(),
            'name' => $user->name,
            'email' => $user->email,
            'role' => $user->role
        ];
    }

    public function includeLanguage(User $user)
    {
        return $this->item($user->language, new LanguageTransformer);
    }

    public function includeAddresses(User $user)
    {
        return $this->collection($user->addresses, new AddressTransformer);
    }
}
