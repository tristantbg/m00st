<?php if(!defined('KIRBY')) exit ?>

title: Project
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
  medias:
    label: Gallery
    type: builder
    fieldsets:
      image:
        label: Image
        entry: >
               <table style="width:100%; font-size: 11px">
               <tr>
               <td style="width:20%">Image</td>
               <td>Image size</td>
               <td>Height</td>
               </tr>
               <tr>
               <td style="width:20%"><img src="{{_thumb}}" width="80px"><br>{{content}}</td>
               <td>{{imagesize}}</td>
               <td>{{height}}</td>
               </tr>
               </table>
        fields:
          content:
            label: Image
            type: quickselect
            options: images
          imagesize:
            label: Image size
            type: fieldtoggle
            default: custom
            width: 1/2
            options:
              full: Fullscreen 
              custom: Custom
            show:
              custom: height
            hide:
              full: height
          height:
            label: Height (%)
            type: number
            default: 100
            min: 0
            required: true
            width: 1/2
      twoimages:
        label: Two images
        entry: >
               <table style="width:100%; font-size: 11px">
               <tr>
               <td style="width:20%">Image 1</td>
               <td>Size 1</td>
               <td style="width:20%">Image 2</td>
               <td>Size 2</td>
               </tr>
               <tr>
               <td style="width:20%"><img src="{{_thumb1}}" width="80px"><br>{{content1}}</td>
               <td>{{size1}}</td>
               <td style="width:20%"><img src="{{_thumb2}}" width="80px"><br>{{content2}}</td>
               <td>{{size2}}</td>
               </tr>
               </table>
        fields:
          content1:
            label: Image 1
            type: quickselect
            options: images
            required: true
            width: 1/2
          size1:
            label: Image size
            type: fieldtoggle
            default: full
            width: 1/2
            options:
              full: Full
              contain: Contain
          content2:
            label: Image 2
            type: quickselect
            options: images
            required: true
            width: 1/2
          size2:
            label: Image size
            type: fieldtoggle
            default: full
            width: 1/2
            options:
              full: Full
              contain: Contain
      collage:
        label: Collage
        entry: >
               <table style="width:100%; font-size: 11px">
               <tr>
               <td style="width:20%">{{content}}</td>
               </tr>
               </table>
        fields:
          content:
            label: Collage images
            type: images
      gallery:
        label: Lazy Gallery
        entry: >
               <table style="width:100%; font-size: 11px">
               <tr>
               <td style="width:20%">{{content}}</td>
               </tr>
               </table>
        fields:
          content:
            label: Gallery images
            type: images