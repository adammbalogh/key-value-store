<?php namespace AdammBalogh\KeyValueStore\Adapter;

class NullAdapter extends AbstractAdapter
{
    use NullAdapter\ClientTrait, NullAdapter\KeyTrait, NullAdapter\StringTrait;
}
