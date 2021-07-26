<template>
  <div>
    <div class="card bg-light">
      <div class="card-body">
        <form @submit.prevent="filterData">
          <div class="row">
            <text-input label="Città" v-model="filters.city"> </text-input>

            <text-input
              label="N. minimo di stanze"
              v-model="filters.number_rooms"
            >
            </text-input>

            <text-input
              label="N. minimo di letti"
              v-model="filters.number_beds"
            >
            </text-input>

            <div class="mb-3">
              <label for="distance" class="forma-label">Distanza</label>
              <input
                class="form-control"
                type="range"
                id="distance"
                name="distance"
                min="0"
                max="40"
                step="1"
                list="tickmarks"
                v-model="filters.distance"
              />

              <datalist id="tickmarks">
                <option value="0"></option>
                <option value="5"></option>
                <option value="10"></option>
                <option value="15"></option>
                <option value="20"></option>
                <option value="25"></option>
                <option value="30"></option>
                <option value="35"></option>
                <option value="40"></option>
              </datalist>
            </div>
            <div class="mb-3">{{ filters.distance }}</div>
          </div>

          <div v-for="service in services" :key="service.id">
            <label :for="service.title">
              {{ service.title }}
              <input
                type="checkbox"
                v-model="filters.services"
                :value="service.id"
                :name="service.title"
                :id="service.title"
              />
            </label>
          </div>

          <div>
            <input
              type="button"
              value="FILTRA"
              @click="filteredAccomodationsCall()"
            />
            <input type="button" value="RESET" @click="resetAccomodations()" />
          </div>
        </form>
      </div>
    </div>

    <div class="row">
      <div class="col-4">
        <div
          class="card"
          style="width: 100%"
          v-for="accomodation in filteredAccomodations"
          :key="accomodation.id"
        >
          <div class="card-body">
            <img
              :src="accomodation.placeholder"
              alt="..."
              class="img-thumbnail"
            />
            <h5 class="card-title">{{ accomodation.title }}</h5>
            <p class="card-text">{{ accomodation.description }}</p>
            <div>
              <span class="badge badge-primary ml-1" v-for="service in accomodation.services"> {{ service.title }} </span>
            </div>
            <a :href="accomodation.link" class="card-link">Visualizza</a>
            <p v-if="accomodation.views">Views: {{ accomodation.views.length }}</p>
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
      originalAccomodations: [],
      filteredAccomodations: [],
      services: [],
      filters: {
        city: "",
        number_rooms: "",
        number_beds: "",
        distance: 20,
        services: [],
      },
    };
  },
  methods: {
    resetAccomodations() {
      this.filteredAccomodations = this.originalAccomodations;
    },
    callAccomodations() {
      axios
        .get("/api/accomodation")
        .then((resp) => {
          this.originalAccomodations = resp.data.results.data;
          this.filteredAccomodations = resp.data.results.data;
          console.log(this.originalAccomodations);
        })
        .catch((er) => console.log(er));
    },
    filteredAccomodationsCall() {
      axios
        .get("/api/accomodation/filtered", {
          params: this.filters,
        })
        .then((resp) => {
          this.filteredAccomodations = resp.data.results;
          console.log(this.filters);
        })
        .catch((er) => console.log(er));
    },
    callMap() {
      console.log("ciao");
      this.originalAccomodations.forEach((accomodation) => {
        var compactStreetName = accomodation.street_name.replace(/\s/g, "");

        var urlGetPosition =
          "https://boolbnbproxy.herokuapp.com/https://api.tomtom.com/search/2/geocode/" +
          accomodation.province +
          "%20" +
          accomodation.city +
          "%20" +
          accomodation.type_street +
          "%20" +
          compactStreetName +
          "%20" +
          accomodation.building_number +
          ".json?Key=t4QufcKAvdkiBeKqaOB5kwMYk71Rx8b6";
        axios
          .get(urlGetPosition)
          .then((resp) => {
            console.log(urlGetPosition);

            // this.z.push(resp.data.results.position);
            console.log(resp.data.result[0].position);
          })
          .catch((er) => {
            console.log(er);
          });
      });
    },
    callServices() {
      axios.get("/api/services").then((resp) => {
        this.services = resp.data.results;
      });
    },
  },
  mounted() {
    this.callAccomodations();
    this.callServices();
    // this.callMap();
  },
};
</script>
