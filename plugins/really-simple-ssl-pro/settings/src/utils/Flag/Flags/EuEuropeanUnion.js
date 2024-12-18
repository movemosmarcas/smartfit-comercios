import * as React from "react";
const EuEuropeanUnion = (props) => (
  <svg
    xmlns="http://www.w3.org/2000/svg"
    xmlnsXlink="http://www.w3.org/1999/xlink"
    width="1em"
    height="1em"
    {...props}
  >
    <desc>{"European flag"}</desc>
    <defs>
      <g id="Eu_EuropeanUnion_svg__e">
        <g id="EuropeanUnion_svg__b">
          <path
            id="EuropeanUnion_svg__a"
            d="M0 0v1h.5z"
            transform="rotate(18 3.157 -.5)"
          />
          <use xlinkHref="#EuropeanUnion_svg__a" transform="scale(-1 1)" />
        </g>
        <g id="EuropeanUnion_svg__d">
          <use xlinkHref="#EuropeanUnion_svg__b" transform="rotate(72)" />
          <use xlinkHref="#EuropeanUnion_svg__b" transform="rotate(144)" />
        </g>
        <use xlinkHref="#EuropeanUnion_svg__d" transform="scale(-1 1)" />
      </g>
    </defs>
    <path fill="#039" d="M0 0h810v540H0z" />
    <g fill="#fc0" transform="matrix(30 0 0 30 405 270)">
      <use xlinkHref="#EuropeanUnion_svg__e" y={-6} />
      <use xlinkHref="#EuropeanUnion_svg__e" y={6} />
      <g id="EuropeanUnion_svg__f">
        <use xlinkHref="#EuropeanUnion_svg__e" x={-6} />
        <use
          xlinkHref="#EuropeanUnion_svg__e"
          transform="rotate(-144 -2.344 -2.11)"
        />
        <use
          xlinkHref="#EuropeanUnion_svg__e"
          transform="rotate(144 -2.11 -2.344)"
        />
        <use
          xlinkHref="#EuropeanUnion_svg__e"
          transform="rotate(72 -4.663 -2.076)"
        />
        <use
          xlinkHref="#EuropeanUnion_svg__e"
          transform="rotate(72 -5.076 .534)"
        />
      </g>
      <use xlinkHref="#EuropeanUnion_svg__f" transform="scale(-1 1)" />
    </g>
  </svg>
);
export default EuEuropeanUnion;

