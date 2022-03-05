/**
 * Copyright (c) Tiny Technologies, Inc. All rights reserved.
 * Licensed under the LGPL or a commercial license.
 * For LGPL see License.txt in the project root for license information.
 * For commercial licenses see https://www.tiny.cloud/
 *
 * Version: 5.10.0 (2021-10-11)
 */
(function () {
    'use strict';

    var global = tinymce.util.Tools.resolve('tinymce.PluginManager');

    function Plugin () {
      global.add('textcolor', function () {
      });
    }

    Plugin();

}());
