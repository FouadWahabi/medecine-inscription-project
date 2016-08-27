/**
 * Created by Abbes on 27/08/2016.
 */
export function ngFileSelect($parse, $timeout) {
    return function(scope, elem, attr) {
        var fn = $parse(attr['ngFileSelect']);
        elem.bind('change', function(evt) {
            var files = [], fileList, i;
            fileList = evt.target.files;
            if (fileList != null) {
                for (i = 0; i < fileList.length; i++) {
                    files.push(fileList.item(i));
                }
            }
            $timeout(function() {
                fn(scope, {
                    $files : files,
                    $event : evt
                });
            });
        });
    };
}