<?php
namespace DigitalUnityCa\Translatable;

/**
 * Translatable class
 *
 * Class Translatable
 * @package DigitalUnityCa\Translatable
 */
class Translatable
{
    /** @var string */
    public $separator;

    public function __construct()
    {
        $this->separator = config('backpack.translatable.separator');
    }

    /**
     * Regex Pattern
     * @return string
     */
    public function getLocalePattern()
    {
        return '/^(\w*)'.$this->separator.'(\w{2})$/is';
    }

    /**
     * Get active languages
     * @param $withAbbr, if is true return [locale_id => abbr] array, if false - only [locale_id]
     * @return bool
     */
    public function isLocalizedInput($inputName): bool
    {
        return preg_match($this->getLocalePattern(), $inputName);
    }

    /**
    * Get matches for localized pattern
    * @param string $field
    * @return bool
    */
    public function getLocalePatternMatches($field):array
    {
        preg_match($this->getLocalePattern(), $field, $matches);
        return $matches;
    }

    /**
     * Get language id
     * @param $localeAbbr
     * @return int
     */
    public function localeId($localeAbbr = null): int
    {
        return 2;
    }

    /**
     * Get localized field name
     * @param $localeAbbr
     * @return int
     */
    public function localizedFieldName(string $field, string $localeAbbr): string
    {
        return strtolower($field.$this->separator.$localeAbbr);
    }

    /**
     * Get active locales array
     *
     * @param bool $withAbbr
     * @return array
     */
    function activeLocales(bool $withAbbr = false): array
    {
        return [2 => 'fr'];
    }
}