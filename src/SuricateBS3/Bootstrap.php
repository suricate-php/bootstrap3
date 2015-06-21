<?php
namespace SuricateBS3;

use \Suricate\FormItem;

class Bootstrap
{
    public static function panel($title, $content, $titleAddon = '')
    {
        $output  = '<div class="row">';
        $output .= '    <div class="panel panel-default">';
        $output .= '        <div class="panel-heading clearfix">';
        $output .= '            <h3 class="panel-title pull-left">' . $title . '</h3>';
        if ($titleAddon != '') {
            $output .= '    <div class="pull-right">' . $titleAddon . '</div>';
        }
        $output .= '        </div>';
        $output .= '        <div class="panel-body">';
        $output .=              $content;
        $output .= '        </div>';
        $output .= '    </div>';
        $output .= '</div>';

        return $output;
    }

    public static function icon($type)
    {
        return '<span class="glyphicon glyphicon-' . $type . '" aria-hidden="true"></span> ';
    }

    public static function alert($content, $level = 'success', $icon = null)
    {
        $output  = '<div class="alert alert-' . $level . '" role="alert">';
        $output .=      self::icon($icon);
        $output .=      $content;
        $output .= '</div>';

        return $output;
    }

    public static function formText($name, $value, $itemData = array())
    {
        $label          = isset($itemData['label']) ? $itemData['label'] : '';
        unset($itemData['label']);
        if (isset($itemData['class'])) {
            $itemData['class'] = 'form-control ' . $itemData['class'];
        } else {
            $itemData['class'] = 'form-control';
        }
        
        $output  = '<div class="form-group">';
        $output .=      FormItem::text($name, $value, $label, $itemData);
        $output .= '</div>';

        return $output;
    }

    public static function formFile($name, $itemData = array())
    {
        $label          = isset($itemData['label']) ? $itemData['label'] : '';
        unset($itemData['label']);
        if (isset($itemData['class'])) {
            $itemData['class'] = 'form-control ' . $itemData['class'];
        } else {
            $itemData['class'] = 'form-control';
        }
        $output  = '<div class="form-group">';
        $output .=      FormItem::file($name, $label, $itemData);
        $output .= '</div>';

        return $output;
    }

    public static function formSelect($name, $availableValues, $value, $itemData = array())
    {
        $label          = isset($itemData['label']) ? $itemData['label'] : '';
        unset($itemData['label']);
        if (isset($itemData['class'])) {
            $itemData['class'] = 'form-control ' . $itemData['class'];
        } else {
            $itemData['class'] = 'form-control';
        }
        
        $output  = '<div class="form-group">';
        $output .=      FormItem::select($name, $availableValues, $value, $label, $itemData);
        $output .= '</div>';

        return $output;
    }

    public static function formTextArea($name, $value, $itemData = array())
    {
        $label          = isset($itemData['label']) ? $itemData['label'] : '';
        unset($itemData['label']);
        if (isset($itemData['class'])) {
            $itemData['class'] = 'form-control ' . $itemData['class'];
        } else {
            $itemData['class'] = 'form-control';
        }
        
        $output  = '<div class="form-group">';
        $output .=      FormItem::textarea($name, $value, $label, $itemData);
        $output .= '</div>';

        return $output;
    }

    public static function formCheckbox($name, $value, $checked, $itemData = array())
    {
        $label = isset($itemData['label']) ? $itemData['label'] : '';
        unset($itemData['label']);
        if (isset($itemData['class'])) {
            $itemData['class'] = 'form-control ' . $itemData['class'];
        } else {
            $itemData['class'] = 'form-control';
        }
        
        $output  = '<div class="form-group">';
        $output .=      FormItem::checkbox($name, $value, $checked, $label, $itemData);
        $output .= '</div>';

        return $output;
    }

    public static function submit($name, $value, $type = 'button', $size = null, $itemData = array())
    {
        return self::button($name, $value, $type, $size, $itemData, 'submit');
    }

    public static function button($name, $value, $size, $itemData = array(), $type = 'button')
    {
        if (isset($itemData['class'])) {
            $itemData['class'] = 'btn ' . $itemData['class'];
        } else {
            $itemData['class'] = 'btn';
        }
        if ($type == 'submit') {
            return FormItem::button($name, $value, null, $itemData);
        } else {
            return FormItem::submit($name, $value, null, $itemData);
        }
    }
}