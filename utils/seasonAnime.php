<?php
/**
 * ngurangin taun
 */
function subDate(int $year): string
{
  return date("Y", strtotime("-{$year} year"));
}
function winter(): string
{
  return constant('Jikan\Helper\Constants::WINTER');
}
function fall(): string
{
  return constant('Jikan\Helper\Constants::FALL');
}
function summer(): string
{
  return constant('Jikan\Helper\Constants::SUMMER');
}
function spring(): string
{
  return constant('Jikan\Helper\Constants::SPRING');
}
