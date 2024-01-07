<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Demo: How geocoding works</title>
    <meta name="robots" content="noindex, nofollow" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://api.mapbox.com/mapbox-assembly/v1.3.0/assembly.min.css" rel="stylesheet" />
    <script src="https://api.tiles.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
    <link href="https://api.tiles.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css" rel="stylesheet" />
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.css" type="text/css" />

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #geocoder-container>div {
            min-width: 50%;
            margin-left: 25%;
        }

        .string {
            color: #314ccd;
        }

        .number {
            color: #b43b71;
        }

        .boolean {
            color: #5a3fc0;
        }

        .null {
            color: #ba7334;
        }

        .key {
            color: #ba3b3f;
        }
    </style>
    <script src="https://js.sentry-cdn.com/9c5feb5b248b49f79a585804c259febc.min.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="flex h-viewport-full relative overflow-hidden">
        <div class="w-full w240-mm absolute static-mm left bottom">
            <div class="flex flex--column h-viewport-1/3 h-full-mm hmax-full bg-white overflow-auto">
                <div class="px12 py12 bg-darken5">
                    <h1 class="txt-bold txt-m">Forward geocoding response object</h1>
                    <div class="txt-s">View the raw JSON response from your query.</div>
                </div>
                <div class="flex-child-grow px12 py12 overflow-auto">
                    <pre id="json-response" class="txt-s">
Search for a place by typing the place name. Your results will be displayed here!</pre>
                </div>
            </div>
        </div>
        <div class="flex-child-grow bg-white h-viewport-2/3 h-viewport-full-mm" id="map"></div>
    </div>

    <script>
        mapboxgl.accessToken = 'pk.eyJ1IjoiZXhhbXBsZXMiLCJhIjoiY2p0MG01MXRqMW45cjQzb2R6b2ptc3J4MSJ9.zA2W0IkI0c6KaAhJfk9bWg';
        const map = new mapboxgl.Map({
            container: 'map',
            style: 'mapbox://styles/mapbox/streets-v12',
            center: [-77.0091, 38.8899],
            zoom: 13
        });

        const geocoder = new MapboxGeocoder({
            accessToken: mapboxgl.accessToken,
            mapboxgl: mapboxgl
        });

        map.addControl(geocoder, 'top-left');

        map.on('load', () => {
            // Listen for the `geocoder.input` event that is triggered when a user
            // makes a selection
            geocoder.on('result', (event) => {
                const styleSpecBox = document.getElementById('json-response');
                styleSpecBox.innerHTML = `${syntaxHighlight(
            JSON.stringify(event.result, null, 2)
          )}`;
            });
        });

        function syntaxHighlight(json) {
            json = json
                .replace(/&/g, '&amp;')
                .replace(/</g, '&lt;')
                .replace(/>/g, '&gt;');
            return json.replace(
                /("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+-]?\d+)?)/g,
                (match) => {
                    let cls = 'number';
                    if (/^"/.test(match)) {
                        if (/:$/.test(match)) {
                            cls = 'key';
                        } else {
                            cls = 'string';
                        }
                    } else if (/true|false/.test(match)) {
                        cls = 'boolean';
                    } else if (/null/.test(match)) {
                        cls = 'null';
                    }
                    return `<span class="${cls}">${match}</span>`;
                }
            );
        }
    </script>
</body>

</html>