<!DOCTYPE html>
<html lang =”en” >    
    
        <?php include('parts/header.php'); ?>
        <div id="content">
            <main>
                <div id="lead">
                <img src="https://placekitten.com/200/139" alt="a cute picture of a kitten" />
                
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam malesuada
                        tempor orci quis euismod. Morbi ac auctor est, a scelerisque neque. Quisque dignissim
                        turpis et porta laoreet. Suspendisse nec metus viverra tellus congue rutrum. Interdum
                        et malesuada fames ac ante ipsum primis in faucibus. Donec eu auctor leo, vel volutpat
                        turpis. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras lacinia dui
                        ligula, ut eleifend sem ultrices euismod. Praesent rhoncus libero sit amet libero
                        fringilla molestie. Maecenas vitae mi non velit finibus hendrerit. Etiam sed lorem
                        libero. Pellentesque vel feugiat ligula. Integer ut tincidunt risus. Cras dignissim in
                        neque nec fringilla. Mauris auctor mi purus, vitae consequat nibh suscipit eu.
                    </p>
                </div>

                <?php
                    $modules = array(
                        'ce154'=> array(
                        'name' => 'Web Development',
                        'term' => 'spring'
                        ),
                        'ce151' => array(
                        'name' => 'Introduction to Programming',
                        'term' => 'autumn',
                        ),
                        'ce152'=> array(
                            'name' => 'Object-Oriented Programming',
                            'term' => 'spring'
                            )
                      );
                      
                ?>

            
                <h2 id="modules_title">Modules</h2>
            
                <ul>
                    <?php
                        foreach ($modules as $code => $data) {
                        echo "<li class=\"".$data['term']."\"
                            title=\"".$data['name']."\" >$code</li>";
                        }
                    ?>
                
                    <!-- <li class="spring" title="Web Development">ce154</li>
                    <li class="autumn" title="Introduction to Programming">ce151</li>
                    <li class="spring" title="Object-Oriented Programming">ce152</li> -->
                </ul>

                <h3>module scores</h3>
                <table>
                <thead>
                <tr>
                <th>Module</th>
                <th>Coursework</th>
                <th>Exam</th>
                <th>Total</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                <th>CE000</th>
                <td>50%</td>
                <td>50%</td>
                <th>70%</th>
                </tr>
                <tr>
                <th>CE010</th>
                <td>70%</td>
                <td>20%</td>
                <th>50%</th>
                </tr>
                <tr>
                <th>CE020</th>
                <td>60%</td>
                <td>20%</td>
                <th>30%</th>
                </tr>
                <tr>
                <th>CE030</th>
                <td>30%</td>
                <td>40%</td>
                <th>90%</th>
                </tr>
                </tbody>
                </table>

            </main>
            <?php include('parts/side.php'); ?>
        </div>
        <?php include('parts/footer.php'); ?>
</html>  