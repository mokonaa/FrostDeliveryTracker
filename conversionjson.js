console.log("conversionjson file");

var geojsonFeature = {
    "type": "Feature",
    "properties": {
        "name": "Coors Field",
        "amenity": "Baseball Stadium",
        "popupContent": "This is where the Rockies play!"
    },
    "geometry": {
        "type": "Point",
        "coordinates": [-104.99404, 39.75621]
    }
};

var jsonStructure = {
    "executionTime": "2016-08-30 12:27:40 PM",
    "colis": [{
        "id": 72,
        "positionColisAltitude" : "XXXXXXXX",
        "positionColisLongitude" : "XXXXXXXX",  
      }]
};

var json = {
  "executionTime": "2016-08-30 12:27:40 PM",
  "stationBeanList": [{
    "id": 72,
    "stationName": "W 52 St & 11 Ave",
    "availableDocks": 37,
    "totalDocks": 39,
    "latitude": 40.76727216,
    "longitude": -73.99392888,
    "statusValue": "In Service",
    "statusKey": 1,
    "availableBikes": 2,
    "stAddress1": "W 52 St & 11 Ave",
    "stAddress2": "",
    "city": "",
    "postalCode": "",
    "location": "",
    "altitude": "",
    "testStation": false,
    "lastCommunicationTime": "2016-08-30 12:27:28 PM",
    "landMark": ""
  }, {
    "id": 79,
    "stationName": "Franklin St & W Broadway",
    "availableDocks": 1,
    "totalDocks": 33,
    "latitude": 40.71911552,
    "longitude": -74.00666661,
    "statusValue": "In Service",
    "statusKey": 1,
    "availableBikes": 31,
    "stAddress1": "Franklin St & W Broadway",
    "stAddress2": "",
    "city": "",
    "postalCode": "",
    "location": "",
    "altitude": "",
    "testStation": false,
    "lastCommunicationTime": "2016-08-30 12:25:52 PM",
    "landMark": ""
  }, {
    "id": 3425,
    "stationName": "2 Ave  & E 104 St",
    "availableDocks": 1,
    "totalDocks": 33,
    "latitude": 40.7892105,
    "longitude": -73.94370784,
    "statusValue": "In Service",
    "statusKey": 1,
    "availableBikes": 32,
    "stAddress1": "2 Ave  & E 104 St",
    "stAddress2": "",
    "city": "",
    "postalCode": "",
    "location": "",
    "altitude": "",
    "testStation": false,
    "lastCommunicationTime": "2016-08-30 12:27:21 PM",
    "landMark": ""
  }]
};
var geojson = {
  type: "FeatureCollection",
  features: [],
};

for (i = 0; i < json.stationBeanList.length; i++) {

  geojson.features.push({
    "type": "Feature",
    "geometry": {
      "type": "Point",
      "coordinates": [json.stationBeanList[i].longitude, json.stationBeanList[i].latitude]
    },
    "properties": {
      "id": json.stationBeanList[i].id,
      "stationName": json.stationBeanList[i].stationName,
      "totalDocks": json.stationBeanList[i].totalDocks,
      "station": json.stationBeanList[i].stationName,
      "stAddress1": json.stationBeanList[i].stAddress1,
      "stAddress2": json.stationBeanList[i].stAddress2,
      "city": json.stationBeanList[i].city,
      "postalCode": json.stationBeanList[i].postalCode,
      "testStation": json.stationBeanList[i].testStation
      //"positionColis" : json.stationBeanList[i].positionColis
    }
  });
}

// window.CP.exitedLoop(1);
console.log(geojson);
document.getElementById('json').innerHTML = JSON.stringify(json, null, 2);
document.getElementById('geojson').innerHTML = JSON.stringify(geojson, null, 2);
L.geoJSON(geojsonFeature).addTo(map);
