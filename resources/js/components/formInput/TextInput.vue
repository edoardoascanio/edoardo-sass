<template>
    <div>
        <div class="mb-3">
            <label class="form-label">
                {{ label }}
            </label>

            <input 
            :type="inputType"
            class="form-control" 
         
            :placeholder="placeholder"
            :value="value"
            @input="$emit('input', $event.currentTarget.value)"
            >
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