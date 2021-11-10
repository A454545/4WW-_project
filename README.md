# 4WW3_project  
Course name: Web Computing and Web Systems  
Group name: True Roofs  
Member 1: Abeer Alyasiri, alyasira, 400198787  
Member 2: Lin Rozenszajn, rozensl, 000123400  
<br>  
_____________________________________________  
### Project Link  
Check out the project page at [True Roofs](http://3.130.249.183/index.html)  
<br>  

_____________________________________________  
### Demo Link  
Check out the Sharepoint video at [page tour link](https://mcmasteru365.sharepoint.com/:v:/s/working/EVOEF4e_waROgDby9UmYvzQBkv79yzR6MKXCIaFf4_I-QA?e=nacl4w)  
<br>  

_____________________________________________
### Notes  
1. All resources used to build the project are under references.txt
2. WCAG that was followed for the project is https://www.w3.org/WAI/WCAG21/quickref/#text-alternatives.
3. Completed animation Add-on PART 2
    1. On Profile page --> Content bounce in
	2. On Profile page --> button shake when hovered
	3. On submit page --> content fade in 
	4. On submit page --> button heartbeat when hovered
	5. On submutListing page --> content slide in 
	6. On submitLisitng page --> button heartbeat when hovered
	7. On Login page --> title animation
	8. On Login page --> message animation
	9. On login page --> switch pulse animation
	10. On results page --> zoom in animation
	11. Header title -->  lettering animation for index page and userReg


_____________________________________________
### Add-on #2 Answers - PART 1
1. Section 2(a) describes how to embed different versions (of different sizes and pixel densities) of an image in your html code. For example:

    ```
    <picture>
    <source media="(max-width: 1000px)" srcset="../assets/images/main-1x.png, main-1x.png 1x">
    <source media="(max-width: 2000px)" srcset="../assets/images/main-2x.png, main-2x.png 2x">
    <img src="../assets/images/main.jpg" alt="main listing photo">
    </picture>
    ```

  The picture element contains source tags, srcset attributes and an element. The browser will look for the first source tag whose media query matches the width of the active viewport. The srcset attribute contains the file path of the image to be used if the media query returns true followed by an image descriptor which describes the pixel density of the image. If no media queries evaluate to true or the browser does not support the <picture> element, the url in the src attribute of the img element is used.
<br>
3. Three positive goals that can be achieved through use of the <picture> and <source> attributes are:
  <br>
  i. They can be used to offer alternative image formats, in case one is not supported by the browser.
  <br>
  ii. They can optimize bandwidth and speed, by selectively loading images that are sized appropriately for the viewer's screen.
    <br>
  iii. Offering different images for different media conditions: ie. a cropped image for a smaller display, or a higher-resolution imager for a larger display.
    <br>
4. One negative to using picture and source attributes is that they might not be supported on certain browsers (for example, Internet Explorer). This can be mitigated by including an img element, which acts as a "fallback" option if none of the media queries evaluate to true/none of the image formats are supported/the picture element isn't supported. 
