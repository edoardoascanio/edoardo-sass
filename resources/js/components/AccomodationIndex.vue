<template>
  <div>

    <div class="card bg-light">

      <div class="card-body">

        <form @submit.prevent="filterData">
          <div class="row">
            <text-input label="Ricerca Indirizzo Appartamento"
            v-model="filters.address">
            </text-input>

            <text-input label="N. minimo di stanze"
            v-model="filters.minNRooms">
            </text-input>

            <text-input label="N. minimo di letti"
            v-model="filters.number_beds">
            </text-input>

            <text-input label="Distanza"
            v-model="filters.distance">
            </text-input>
          </div>

          <div v-for="service in services" :key="service.title">
            <label :for="service.title">
              {{ service.title }}
              <input type="checkbox"
              v-model="filters.services" :value="service.id" :name="service.title" :id="service.title">
            </label>
          </div>

          <div>
            <input type="button" value="FILTRA" @click="callAccomodation()">
          </div>
        </form>

      </div>
    </div>

    <div class="row">
      <div class="col-4">
        <div class="card" style="width: 100%"
        v-for="accomodation in filteredAccomodation"
        :key="accomodation.id">

          <div class="card-body">
            <h5 class="card-title">{{ accomodation.title }}</h5>
            <p class="card-text">{{ accomodation.description }}</p>
            <a :href="accomodation.link" class="card-link">Visualizza</a>
          </div>

        </div>
      </div>

      <div class="col-8">
        <!-- <div id="map" class="map"></div> -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AccomodationIndex",
  data() {
    return {
      originalAccomodation: [],
      filteredAccomodation: [],
      services: [],
      filters: {
        address: "",
        minNRooms: "",
        number_beds: "",
        distance: "",
        services: []
      }
      // urlGetPosition: "https://api.tomtom.com/search/2/geocode/" + accomodation.province + "%20" + accomodation.city + "%20" + accomodation.type_street + "%20" + accomodation.street_name + "%20" + accomodation.building_number + ".json?Key=t4QufcKAvdkiBeKqaOB5kwMYk71Rx8b6",
    };
  },
  methods: {
    callAccomodation() {
      axios.get("/api/accomodation/", {
              params: {
                number_beds: this.number_beds
              }
            })
            .then(resp => {
              this.originalAccomodation = resp.data.results;
              this.filteredAccomodation = resp.data.results;
            })
            .catch(er => console.log(er));
    },
    // callMap() {
    //   this.originalAccomodation.forEach(accomodation => {
    //   var compactStreetName = accomodation.street_name.replace(/\s/g, '');

    //   var urlGetPosition = "https://api.tomtom.com/search/2/geocode/" + accomodation.province + "%20" + accomodation.city + "%20" + accomodation.type_street + "%20" + compactStreetName + "%20" + accomodation.building_number + ".json?Key=t4QufcKAvdkiBeKqaOB5kwMYk71Rx8b6";

    //    axios
    //     .get(urlGetPosition, {
    //         headers: {
    //         }
    //      })
    //     .then((resp) => {

    //       // this.z.push(resp.data.results.position);
    //      console.log(resp)
    //     })
    //     .catch((er) => {
    //       console.log(er)
    //     });

    //   });
    // },
    callServices() {
      axios.get("/api/services")
          .then(resp => {
            this.services = resp.data.results;
          });
    }
  },
  mounted() {
    this.callAccomodation();
    this.callServices();
    // this.callMap();
  }
};
</script>
