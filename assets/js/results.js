$(document).ready(function () {

    Orientame = Orientame || {};


    Orientame.results = (function () {

        var skills = [
            {
                text: 'Ser capaz de usar múltiples habilidades matemáticas y pensamiento lógico para resolver problemas en situaciones diarias. Involucra recolectar y ordenar todo tipo de información relacionada a un problema y determinar la mejor forma de solucionarlo.',
                recommendation: 'Campos como la ingeniería, la construcción, las finanzas, ventas, ciencias exactas, y tecnología'
            }, {
                text: 'Ser capaz de entender el significado de las palabras y usarlas efectivamente en una buena comunicación oral o escrita',
                recommendation: 'campos como comunicación, educación, derecho, literatura, y ventas'
            }, {
                text: 'Ser capaz de formar dibujos y objetos en la mente. Involucra el entendimiento de como los diseños representan objetos reales e imaginar cómo diferentes partes encajan juntas.',
                recommendation: 'Campos como arquitectura, carpintería, ingeniería, tecnología, artes visuales, diseño de interiores, y diseño de modas'
            }, {
                text: 'Ser capaz de realizar operaciones aritméticas como suma, resta, multiplicación, y división en tareas diarias que involucren números.',
                recommendation: 'Campos como las finanzas, matemáticas, contaduría'
            }, {
                text: 'Ser capaz de ver diferencias de forma rápida y acertada en material impreso, el cual puede contener texto o números en listas o tablas. Implica velocidad de percepción, la cual es necesaria en muchas tareas industriales, incluso en algunas que no tienen contenido verbal o numérico.',
                recommendation: 'Campos como administración, procesos, bibliotecología, operación de máquinas, empaques, procesamiento de documentos'
            }, {
                text: 'Ser capaz de ver diferencias de forma rápida y acertada en objetos, pinturas o dibujos. Involucra notar pequeñas diferencias en las formas, sombres, longitudes o alturas.',
                recommendation: 'campos como manualidades, artes, joyería, tecnología de producción, control de calidad'
            }
        ]

        var personality = {
            ISTJ: 'Se estima que entre el 10% al 14% de la población posee este tipo de personalidad. Individuos leales, lógicos, organizados, sensibles y verdaderos tradicionalistas que disfrutan de mantener controladas sus vidas y el medio en el cual moran. Son individuos típicamente reservados y serios, son exitosos ejercitando su meticulosidad y siendo extraordinariamente confiables. Son capaces de aislarse de las distracciones de manera de poder encarar un enfoque práctico y lógico a sus tareas, y son capaces de tomar decisiones difíciles que otros tipos evitan tomar.',
            ISFJ: 'Se estima que entre el 9% al 14% de la población posee este tipo de personalidad. Individuos altruistas, con habilidades para tratar con la gente y conformar relaciones sociales sólidas. Suelen ser meticulosos hasta el punto del perfeccionismo, y a pesar de que posponen las cosas, siempre se puede confiar en ellos para hacer el trabajo a tiempo. Toman sus responsabilidades personalmente, y van siempre por encima y más allá, haciendo todo lo posible para superar las expectativas',
            INFJ: 'Se estima que entre el  1% al 3% de la población posee este tipo de personalidad. Individuos concienzudos y regidos por valores. Buscan el significado en relaciones, ideas y eventos, con la intención de comprenderse a ellos mismos y a los demás. Al usar sus aptitudes intuitivas, desarrollan una visión clara en la que confiar, que luego presentan con el objetivo de mejorar la vida de los demás. Sensibles y complejos, les gusta entender complicados problemas y están orientados a resolver diferencias de un modo cooperativo y creativo.',
            INTJ: 'Se estima que entre el 1% al 3% de la población posee este tipo de personalidad. Individuos analíticos, dispuestos a destacar si nadie más parece estar a la altura o si ven una debilidad importante en el liderazgo actual. Tienden a ser pragmáticos, lógicos y creativos. Generalmente, no son susceptibles a las consignas y no reconocen la autoridad basada en la tradición, el rango, o el título. Frecuentemente son plenamente conscientes de sus propios conocimientos y capacidades, igual que sus limitaciones y lo que no saben; de este modo, desarrollan una confianza fuerte en sus habilidades y talentos, y por tanto son líderes naturales.',
            ISTP: 'Se estima que entre el 4% al 6% de la población posee este tipo de personalidad. Individuos que sobresalen a la hora de analizar una situación para llegar al corazón del problema de modo que pueden poner en marcha rápidamente una solución funcional, haciéndolos idealmente apropiados para el campo de la ingeniería. Son personas naturalmente tranquilas, interesadas en entender cómo funcionan los sistemas, concentrándose en la operación eficiente y en la estructura. Pero al contrario que su naturaleza aparentemente distanciada, a menudo son capaces de hacer observaciones humorísticas e ingeniosas sobre el mundo que les rodea.',
            ISFP: 'Se estima que entre el 8% al 10% de la población posee este tipo de personalidad. Individuos pacíficos y con los que es fácil congeniar, adoptan un modo de vida "vive y deja vivir". Disfrutan adquiriendo experiencias a su propio ritmo y tienden a vivir el momento. Aunque silenciosos, son agradables, considerados, atentos, y devotos de las personas que los rodean. Aunque no se inclinan por las discusiones o por expresar sus puntos de vista, sus valores son importantes para ellos.',
            INFP: 'Se estima que entre el 4% al 5% de la población posee este tipo de personalidad. Individuos que concentran mucha de su energía en su mundo interior, dominado por intensos sentimientos y principios rígidos. Buscan una vida exterior que esté a la altura de esos valores. Son curiosos a la hora de entender a las personas de su alrededor, y son flexibles y tolerantes excepto cuando ven amenazados sus valores. Son capaces de tomar en cuenta las opiniones de los demás con tacto, diplomacia, y con la habilidad de ver los diferentes lados de un problema.',
            INTP: 'Se estima que entre el 1% al 5% de la población posee este tipo de personalidad. Individuos analíticos que tienden a pasar largos períodos de tiempo solos, pensando problemas y trabajando en soluciones. Tienen curiosidad por los sistemas y por cómo funcionan las cosas. Consecuentemente, suelen elegir carreras tales como las ciencias, la filosofía, la psicología, la arquitectura, y la abogacía. Los INTP tienden a no sentirse a gusto en situaciones sociales o profesiones asistenciales, pero disfrutan la compañía de quienes comparten sus intereses. Valoran la autonomía en ellos mismos y en los demás.',
            ESTP: 'Se estima que entre el 4% al 10% de la población posee este tipo de personalidad. Individuos que aprenden haciendo y viven el momento, buscando lo mejor de la vida, y deseando compartirlo con sus amigos. Abiertos a situaciones, capaces de improvisar para conseguir los resultados buscados. Son personas activas que desean resolver problemas en vez de solo discutir sobre los mismos.Hábiles para influir sobre otras personas. Concretos en su habla y utilitarios en la acción, son operadores hábiles.',
            ESFP: 'Se estima que entre el 5% al 10% de la población posee este tipo de personalidad. Individuos excelentes trabajando en equipo, enfocados en completar la tarea maximizando el disfrute y con un mínimo de incordio. Son de naturaleza activos, encuentran placer en nuevas experiencias. En la mayoría de sus reacciones son del tipo "manos a la obra". Debido a que aprenden más haciendo que estudiando o leyendo, tienden a apurarse a hacer cosas, aprendiendo al interactuar con el ambiente. Por lo general no les gustan la teoría y las explicaciones escritas. Prácticos, realistas, y específicos, toman decisiones de acuerdo a sus estándares personales.',
            ENFP: 'Se estima que entre el 6% al 10% de la población posee este tipo de personalidad. Individuos extremadamente independientes, y mucho más que la estabilidad y la seguridad, ansían la creatividad y la libertad. Saben cómo relajarse y son perfectamente capaces de pasar de un idealista apasionado impulsado en el lugar de trabajo a un espíritu libre, imaginativo y entusiasta. Son capaces de conectar emocionalmente con los demás, dándoles una visión cuidadosa de lo que motiva a sus amigos y colegas.',
            ENTP: 'Se estima que entre el 2% al 5% de la población posee este tipo de personalidad. Individuos Son a menudo descritos como inteligentes, cerebral y verbalmente rápidos, entusiastas, extrovertidos, innovadores, flexibles, leales y llenos de recursos. Su motivación es la de entender y mejorar el mundo en el que viven. Son normalmente certeros a la hora de evaluar una situación. Idean soluciones innovadoras e inesperadas para problemas complicados. Sin embargo, les interesa más el hecho de generar esas ideas antes que llevarlas a cabo con detallados planes.',
            ESTJ: 'Se estima que entre el 8% al 12% de la población posee este tipo de personalidad. Individuos prácticos, realistas, y con los pies sobre la tierra, con una preferencia natural por los negocios o la mecánica. Si bien no se interesan por temas para los cuales no les ven una aplicación, ellos pueden esforzarse de ser necesario. Les gusta organizar y administrar actividades. Son buenos administradores, especialmente si recuerdan tener en cuenta los sentimientos y puntos de vista de las otras personas, que muy a menudo obvian considerar.',
            ESFJ: 'Se estima que entre el 10% al 15% de la población posee este tipo de personalidad. Individuos sociales y serviciales que disfrutan de todo papel que les permita participar de una manera significativa, siempre y cuando sepan que son valorados y apreciados. Respetan la jerarquía, y hacen todo lo posible para posicionarse con cierta autoridad, lo que les permite mantener las cosas claras, estables y organizadas para todos.',
            ENFJ: 'Se estima que entre el 2% al 5% de la población posee este tipo de personalidad. Individuos excelentes líderes de grupo, tanto de trabajo como de desarrollo social o personal. Poseen la atractiva característica de saber que sus ideas o sugerencias serán fácilmente aceptadas, sin dudar ni un momento que la gente hará lo que ellos sugieran. Y, por lo general, así ocurre puesto que este tipo demuestra un extraordinario don de gentes. Dan gran valor a la cooperación de otros a la vez que ellos condescienden bien a cooperar.',
            ENTJ: 'Se estima que entre el 1% al 3% de la población posee este tipo de personalidad. Individuos que se concentran en desarrollar la forma más eficiente y organizada de realizar una tarea. Esta característica, junto con su preferencia por los objetivos, a menudo resulta en que sean grandes líderes, realistas a la vez que visionarios para implementar un plan de largo alcance. Tienden a ser muy independientes en sus tomas de decisiones, contando con una gran voluntad que los aisla de influencias externas. Por lo general son sumamente competentes, analizan y estructuran el mundo que los rodea de una manera lógica y racional.'
        }


        var interests = [
            {
                text: 'Los “realistas” son personas que se enfrentan a su ambiente de forma objetiva y concreta. Prefieren actividades que impliquen dinamismo, capacidad manual y motora.',
                recommendation: 'ocupaciones relacionadas con el manejo de instrumentos y máquinas '
            }, {
                text: 'Los “investigadores” son personas que se enfrentan al ambiente mediante el uso de la inteligencia, resuelven los problemas a través de las ideas, lenguaje, los símbolos y evitan las situaciones que requieren poner en práctica actividades físicas, sociales y comerciales',
                recommendation: 'profesiones de tipo científico relacionadas con problemas teóricos'
            }, {
                text: 'Los “artistas” son personas que emplean los sentimientos, intuición e imaginación. Evitan situaciones convencionales y se interesan por el contenido artístico.',
                recommendation: 'profesiones relacionadas con las artes, la literatura y el diseño'
            }, {
                text: 'Los “sociales” son personas que se enfrentan a su entorno a través de destrezas que favorecen la comunicación y el entendimiento con los otros.',
                recommendation: 'ocupaciones relacionadas con la interacción social'
            },
            {
                text: 'Los “emprendedores” son personas con actitud audaz, dominante, enérgica e impulsiva. Evitan situaciones de tipo intelectual y estético.',
                recommendation: 'profesiones relacionadas con los negocios y la política'
            }, {
                text: 'Los “convencionales” son personas que escogen objetivos con aprobación social en lugar de los de tipo ético o estético. Prefieren actividades pasivas, ordenadas y muy organizadas.',
                recommendation: 'ocupaciones administrativas, de oficina y de asuntos económicos.'
            },

        ]

        return {
            display: function () {

                var results = $("#profile").data('answers');

                var interest = interests[_.indexOf(results[0], _.max(results[0]))];
                var skill = interests[_.indexOf(results[2], _.max(results[2]))];

                var personalityID = results[1][0] < 0.5 ? 'I' : 'E';
                 personalityID += results[1][1] < 0.5 ? 'S' : 'N';
                 personalityID += results[1][1] < 0.5 ? 'T' : 'F';
                 personalityID += results[1][1] < 0.5 ? 'J' : 'P';


                $("#interests-description").text(interest.text);
                $("#skills-description").text(skill.text);
                $("#personality-description").text(personality[personalityID]);


                $("#interests-recommendation").text(interest.recommendation);
                $("#skills-recommendation").text(skill.recommendation);

            }
        }


    })();

    Orientame.results.display();
});
