<?php
namespace Craft;

class CraftCleanCode_CodeFieldType extends BaseFieldType
{
    public function getName()
    {
        return Craft::t('Code');
    }

    //https://craftcms.stackexchange.com/questions/10594/custom-field-type-that-has-multiple-fields-to-extend-the-default-field-types
    public function getInputHtml($name, $value) {
        // If value is null, we set it to an array to prevent template errors
        if(!$value) {
            $value = array();
        }

        $id = craft()->templates->formatInputId($name);
        $namespacedId = craft()->templates->namespaceInputId($id);

        craft()->templates->includeCssResource('craftcleancode/codemirror/lib/codemirror.css');
        craft()->templates->includeJsResource('craftcleancode/codemirror/lib/codemirror.js');
        craft()->templates->includeJsResource('craftcleancode/codemirror/addon/display/autorefresh.js');
        craft()->templates->includeJsResource('craftcleancode/codemirror/mode/javascript/javascript.js');
        craft()->templates->includeJsResource('craftcleancode/codemirror/mode/clike/clike.js');
        craft()->templates->includeJsResource('craftcleancode/codemirror/mode/css/css.js');
        craft()->templates->includeJsResource('craftcleancode/codemirror/mode/lua/lua.js');
        craft()->templates->includeJsResource('craftcleancode/codemirror/mode/markdown/markdown.js');
        craft()->templates->includeJsResource('craftcleancode/codemirror/mode/nginx/nginx.js');
        craft()->templates->includeJsResource('craftcleancode/codemirror/mode/php/php.js');
        craft()->templates->includeJsResource('craftcleancode/codemirror/mode/python/python.js');
        craft()->templates->includeJsResource('craftcleancode/codemirror/mode/sass/sass.js');
        craft()->templates->includeJsResource('craftcleancode/codemirror/mode/sql/sql.js');
        craft()->templates->includeJsResource('craftcleancode/codemirror/mode/vue/vue.js');
        craft()->templates->includeJsResource('craftcleancode/codemirror/mode/xml/xml.js');
        craft()->templates->includeJsResource('craftcleancode/codemirror/mode/yaml/yaml.js');
        craft()->templates->includeCssResource('craftcleancode/code.css');

        $language = 'javascript';

        return craft()->templates->render('craftcleancode/backend/code', array(
            'name'  => $name,
            'value' => $value,
            'language' => $language,
            'id' => $namespacedId
        ));
    }

    public function defineContentAttribute() {
        return array(AttributeType::String, 'column' => ColumnType::Text);
	}

    public function prepValueFromPost($value) {   
        // var_dump(json_encode($value));
        // die();
        return json_encode($value);
    }

    public function prepValue($value) {
        return json_decode($value, TRUE);
    }
}