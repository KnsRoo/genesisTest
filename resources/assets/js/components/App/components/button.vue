<template>
	<button class = "button-input button-input_blue"
			:disabled = "disabled"
			:class = "{'button-input-disabled': disabled}"
			@click = "$emit('onclick')">
        <span class = "button-input-inner">
            <span class = "button-input-inner__text">{{caption}}</span>
        </span>
    </button>
</template>

<script>
export default {
	name: 'custom-button',
	props: {
		caption: String,
		disabled: Boolean
	}
}
</script>

<style>
    .button-input {
        max-height: 38px;
        padding: 10px;
        border: 1px solid #dbdedf;
        border-radius: 3px;
        vertical-align: middle;
        color: #2e3640;
        font-size: 14px;
        line-height: 14px;
        outline: 0;
        z-index: 1;
        white-space: nowrap;
        text-decoration: none;
    }

    .button-input_blue:not(.button-input-disabled) {
        border: 1px solid #4077d6;
        background: #4c8bf7;
        color: #fff;
    }

    .button-input:hover:not(.button-input-disabled){
        background:#1992d5;
        color:#fff
    }

    .button-input-inner {
        display: -webkit-inline-box;
        display: inline-flex;
        -webkit-box-align: center;
        align-items: center;
        position: relative;
    }

    .button-input-disabled {
        cursor: default;
        color: #2e3640;
        opacity: .6;
    }
</style>