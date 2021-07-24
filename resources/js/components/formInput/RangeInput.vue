<template>
    <div>
        <div class="mb-3">
            <label class="form-label">
                {{ label }}
            </label>

            <input class="form-control"
            type="range"
            :placeholder="placeholder"
            :value="value">
        </div>
    </div>
</template>

<script>
export default {
    name:"TextInput",
    props: {
        label: String,
        value: String,
        placeholder: String,
        inputType: {
            type: String,
            default: "text"
        }
    }
}
</script>