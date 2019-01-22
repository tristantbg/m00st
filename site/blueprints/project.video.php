<?php if(!defined('KIRBY')) exit ?>

title: Project Video
pages: false
files:
  fields:
    position:
      type: position
      label: Size & Position
      help: Unavailable on small screens.
    caption:
      label: Caption
      type: text
fields:
  prevnext: prevnext
  headMain:
    label: Page infos
    type: headline
  title:
    label: Title
    type:  text
    width: 3/4
  featured:
    label: Featured image
    type: image
    width: 1/4
  subtitle:
    label: Subtitle
    type:  text
    width: 3/4
  date:
    label: Date
    type: date
    format: YYYY
    width: 1/4
  text:
    label: Text
    type:  textarea
    buttons:
      - page
      - link
      - italic
  headContent:
    label: Content
    type: headline
  embed:
  	label: Video
  	type: embed