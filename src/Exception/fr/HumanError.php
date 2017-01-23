<?php

namespace Omnipay\PayOnline\Exception\fr;

use Omnipay\PayOnline\Exception\LocalizedError;

/**
 * PayOnline protocol errors french localization.
 */
class HumanError extends LocalizedError
{
    protected static $_errors = [
        '1000' => "Erreur technique. Cette transaction ne peut pas être traitée. Merci de répéter la tentative de paiement dans un moment ou veuillez contacter le service d'assistance technique.",
        '2000' => 'La transaction est rejetée par le système de sécurité.Т',
        '2300' => 'La transaction est rejetée par le système de sécurité bancaire.',
        '3000' => "Erreur technique côté bancaire.Cette transaction ne peut pas être traitée. Merci de répéter la tentative de paiement dans un moment ou veuillez contacter le service d'assistance technique.",
        '4000' => 'Des données incorrectes ont été relevées.',
        '4001' => "Erreur technique. Cette transaction ne peut pas être traitée. Merci de répéter la tentative de paiement dans un moment ou veuillez contacter le service d'assistance technique.",
        '4002' => "Erreur technique. Cette transaction ne peut pas être traitée. Merci de répéter la tentative de paiement dans un moment ou veuillez contacter le service d'assistance technique.",
        '4003' => "Erreur technique. Cette transaction ne peut pas être traitée. Merci de répéter la tentative de paiement dans un moment ou veuillez contacter le service d'assistance technique.",
        '4022' => "Erreur technique. Cette transaction ne peut pas être traitée. Merci de répéter la tentative de paiement dans un moment ou veuillez contacter le service d'assistance technique.",
        '4023' => "Erreur technique. Cette transaction ne peut pas être traitée. Merci de répéter la tentative de paiement dans un moment ou veuillez contacter le service d'assistance technique.",
        '4400' => "Erreur technique. Cette transaction ne peut pas être traitée. Merci de répéter la tentative de paiement dans un moment ou veuillez contacter le service d'assistance technique.",
        '4401' => "Erreur technique. Cette transaction ne peut pas être traitée. Merci de répéter la tentative de paiement dans un moment ou veuillez contacter le service d'assistance technique.",
        '5000' => "Erreur technique. Cette transaction ne peut pas être traitée. Merci de répéter la tentative de paiement dans un moment ou veuillez contacter le service d'assistance technique.",
        '5205' => 'Vos réserves ne sont pas suffisantes.',
        '5301' => "La transaction est rejetée par l'émetteur de la carte bancaire.",
        '5302' => "La transaction est rejetée par l'émetteur de la carte bancaire.",
        '5303' => "La transaction est rejetée par l'émetteur de la carte bancaire.",
        '5304' => "La transaction est rejetée par l'émetteur de la carte bancaire.",
        '5305' => "La transaction est rejetée par l'émetteur de la carte bancaire.",
        '5306' => "La transaction est rejetée par l'émetteur de la carte bancaire.",
        '5307' => 'La limite de la carte est dépassée.',
        '5308' => "La transaction est rejetée par l'émetteur de la carte bancaire.",
        '5309' => 'La limite de la carte est dépassée pour cette opération.',
        '5310' => 'Le montant limite pour cette carte est dépassé.',
        '5320' => "La transaction est rejetée par l'émetteur de la carte bancaire.",
        '5333' => "La transaction est rejetée par l'émetteur de la carte bancaire.",
        '5334' => "La transaction est rejetée par l'émetteur de la carte bancaire.",
        '5396' => "La transaction est rejetée par l'émetteur de la carte bancaire.",
        '5401' => "La transaction est rejetée par l'émetteur de la carte bancaire.",
        '5410' => "La transaction est rejetée par l'émetteur de la carte bancaire.",
        '5411' => "La transaction est rejetée par l'émetteur de la carte bancaire.",
        '5412' => "La transaction est rejetée par l'émetteur de la carte bancaire.",
        '5501' => "La transaction est rejetée par l'émetteur de la carte bancaire.",
        '5502' => "La transaction est rejetée par l'émetteur de la carte bancaire.",
        '6000' => "La transaction est rejetée par l'émetteur de la carte bancaire.",
        '6001' => "Transaction rejetée par l'émetteur de la carte de crédit à l'authentification 3-D Secure.",
        '6002' => "Transaction rejetée par l'émetteur de la carte de crédit à l'authentification 3-D Secure.",
        '6003' => "Transaction rejetée par l'émetteur de la carte de crédit à l'authentification 3-D Secure.",
        '6004' => "Transaction rejetée par l'émetteur de la carte de crédit à l'authentification 3-D Secure.",
        '6100' => "Transaction rejetée par l'émetteur de la carte de crédit à l'authentification 3-D Secure.",
        '6101' => "Transaction rejetée par l'émetteur de la carte de crédit à l'authentification 3-D Secure.",
        '6110' => "Transaction rejetée par l'émetteur de la carte de crédit à l'authentification 3-D Secure.",
    ];
}
