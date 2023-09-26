import * as dom from '../utils/dom'
import { isUpdatableParameter } from '../utils/params.js'
import { warn } from '../utils/utils.js'
import privateProps from '../privateProps.js'

/**
 * Updates popup parameters.
 *
 * @param {SweetAlertOptions} params
 */
export function update(params) {
  const popup = dom.getPopup()
  const innerParams = privateProps.innerParams.get(this)

  if (!popup || dom.hasClass(popup, innerParams.hideClass.popup)) {
    warn(
      `You're trying to update the closed or closing popup, that won't work. Use the update() method in preConfirm parameter or show a new popup.`
    )
    return
  }

  const validUpdatableParams = filterValidParams(params)

  const updatedParams = Object.assign({}, innerParams, validUpdatableParams)

  dom.render(this, updatedParams)

  privateProps.innerParams.set(this, updatedParams)
  Object.defineProperties(this, {
    params: {
      value: Object.assign({}, this.params, params),
      writable: false,
      enumerable: true,
    },
  })
}

/**
 * @param {SweetAlertOptions} params
 * @returns {SweetAlertOptions}
 */
const filterValidParams = (params) => {
  const validUpdatableParams = {}
  Object.keys(params).forEach((param) => {
    if (isUpdatableParameter(param)) {
      validUpdatableParams[param] = params[param]
    } else {
      warn(`Invalid parameter to update: ${param}`)
    }
  })
  return validUpdatableParams
}
