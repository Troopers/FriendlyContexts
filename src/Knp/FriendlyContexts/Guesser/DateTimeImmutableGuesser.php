<?php

namespace Knp\FriendlyContexts\Guesser;

class DateTimeImmutableGuesser extends AbstractGuesser implements GuesserInterface
{
    public function supports(array $mapping)
    {
        $mapping = array_merge(['type' => null], $mapping);

        return in_array($mapping['type'], ['date_immutable', 'datetime_immutable']);
    }

    public function transform($str, array $mapping = null)
    {
        try {
            return new \DateTimeImmutable($str);
        } catch (\Exception $e) {
            throw new \Exception(sprintf('"%s" is not a supported date_immutable/datetime_immutable format. To know which formats are supported, please visit http://www.php.net/manual/en/datetime.formats.php', $str));
        }
    }

    public function fake(array $mapping)
    {
        return new \DateTimeImmutable();
    }

    public function getName()
    {
        return 'datetime_immutable';
    }
}
