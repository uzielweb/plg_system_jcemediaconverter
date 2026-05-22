<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.Jcemediaconverter
 *
 * @copyright   Copyright (C) 2026 Uziel - Ponto Mega. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

namespace Joomla\Plugin\System\JceMediaConverter\Extension;

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Form\Form;
use Joomla\CMS\Plugin\CMSPlugin;

/**
 * JCE Media Converter Plugin.
 *
 * Automatically converts all core and 3rd party fields of type "media"
 * into type "mediajce" when JCE is installed, bringing JCE file browser dynamically.
 *
 * @since  1.0.0
 */
final class JceMediaConverter extends CMSPlugin
{
    /**
     * Prepare the form to rewrite standard media fields to JCE media fields.
     *
     * @param   Form   $form  The form to be altered.
     * @param   mixed  $data  The associated data for the form.
     *
     * @return  boolean
     */
    public function onContentPrepareForm(Form $form, $data = [])
    {
        $app = Factory::getApplication();

        // Only on admin backend context
        if (!$app->isClient('administrator')) {
            return true;
        }

        $xml = $form->getXml();
        if ($xml) {
            // Find all <field type="media"> tags in the XML
            $mediaFields = $xml->xpath('//field[@type="media"]');

            if (!empty($mediaFields)) {
                // Register JCE mediajce field directories to guarantee resolution
                $form->addFieldPath(JPATH_ADMINISTRATOR . '/components/com_jce/models/fields');
                $form->addFieldPath(JPATH_PLUGINS . '/fields/mediajce/fields');

                // Dynamically rewrite field type from 'media' to 'mediajce'
                foreach ($mediaFields as $field) {
                    $field['type'] = 'mediajce';
                }
            }
        }

        return true;
    }
}
