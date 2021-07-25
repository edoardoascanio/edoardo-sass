<template>
  <div>
    <div class="form-group">
      <label for="country">Paese</label>
      <input
        type="text"
        name="country"
        id="country"
        cols="30"
        rows="10"
        class="form-control"
      />
    </div>

    <div class="form-group">
      <label for="city">Citta'</label>
      <input
        type="text"
        name="city"
        id="city"
        cols="30"
        rows="10"
        class="form-control"
        v-model="address.city"
      />
    </div>

    <div class="form-group">
      <label for="province">Provincia</label>
      <input
        type="text"
        name="province"
        id="province"
        cols="30"
        rows="10"
        class="form-control"
        v-model="address.province"
      />
    </div>

    <div class="form-group">
      <label for="zip">CAP</label>
      <input
        type="text"
        name="zip"
        id="zip"
        cols="30"
        rows="10"
        class="form-control"
        v-model="address.zip"
      />
    </div>

    <div class="form-group">
      <label for="street_name">Tipo di via</label>
      <select id="type_street" name="type_street" v-model="address.type_street">
        <option value="via" selected>Via</option>
        <option value="piazza">Piazza</option>
        <option value="vicolo">Vicolo</option>
      </select>
    </div>

    <div class="form-group">
      <label for="street_name">Nome della via</label>
      <input
        type="text"
        name="street_name"
        id="street_name"
        cols="30"
        rows="10"
        class="form-control"
        v-model="address.street_name"
      />
    </div>

    <div class="form-group">
      <label for="building_number">Numero Civico</label>
      <input
        type="number"
        name="building_number"
        id="building_number"
        cols="30"
        rows="10"
        class="form-control"
        v-model="address.building_number"
      />
    </div>

    <input
     style="display: none"
      type="text"
      v-model="address.position_lat"
      name="lat"
      id="lat"
    />
    <input
      style="display: none"
      type="text"
      v-model="address.position_lon"
      name="lon"
      id="lon"
    />
    <div class="form-group">
      <label for="customSwitch1">Visibile
                <input name="visibility"  type="radio" value="1" id="true">
                </label>
            
                <label for="customSwitch1">Non visibile
                <input name="visibility"  type="radio" value="0" id="false">
                </label>
    </div>

    <button class="form-control btn btn-success text-capitalize" @click.prevent="callPosition()">Crea</button>

    <div style="display: none" class="form-group" >
      <input
      id="newAccomodation"
        type="submit"
        value="Crea"
        class="form-control btn btn-success text-capitalize"
      />
    </div>
  </div>
</template>

<script>
export default {
  name: "AddPositions",
  data() {
    return {
      address: {
        city: "",
        province: "",
        type_street: "",
        street_name: "",
        building_number: "",
        zip: "",
        position_lat: "",
        position_lon: "",
      },
      config: {
        headers: { "Access-Control-Allow-Origin": "*" },
      },
    };
  },
  methods: {
    callPosition() {
      if (
      this.address != "" &&
      this.province != "" &&
      this.type_street != "" &&
      this.street_name != "" &&
      this.building_number != ""
    ) {
      axios
        .get(
          "https://boolbnbproxy.herokuapp.com/" +
            "https://api.tomtom.com/search/2/geocode/" +
            this.address.province +
            "%20" +
            this.address.city +
            "%20" +
            this.address.type_street +
            "%20" +
            this.address.street_name +
            "%20" +
            this.address.building_number +
            ".json?Key=t4QufcKAvdkiBeKqaOB5kwMYk71Rx8b6"
        )
        .then((resp) => {
          console.log(resp.data.results[0].position);
          this.address.position_lat = resp.data.results[0].position.lat;
          this.address.position_lon = resp.data.results[0].position.lon;
          setTimeout(() => {

            document.getElementById("newAccomodation").click();
          }, 500)
        });
    }
    },
  },
};
</script>
