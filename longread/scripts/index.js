const path = require('path');
const glob = require('glob');
const fs = require('fs-extra');
const sharp = require('sharp');
const imagemin = require('imagemin');
const imageminPngquant = require('imagemin-pngquant');

const projectRootFolder = path.resolve(__dirname, `..`);

const inputFolder = path.resolve(projectRootFolder, 'src/assets/img/orig');
const outputFolder = path.resolve(projectRootFolder, 'src/assets/img/optim');

const scales = [0.1, 0.2, 0.333, 0.5, 0.666, 0.75, 0.85, 1];

const globPromised = (input, options) => {
  return new Promise((resolve, reject) => {
    glob(input, options, (er, files) => {
      if (er) {
        return reject(er);
      }
      resolve(files);
    });
  });
};

const promiseSerial = funcs =>
  funcs.reduce(
    (promise, func) =>
      promise.then(result => func().then(Array.prototype.concat.bind(result))),
    Promise.resolve([])
  );

const init = async () => {
  await fs.emptyDir(outputFolder);
  const files = await globPromised(`${inputFolder}/**/*.?(jp?(e)g|png)`);
  await promiseSerial(
    files.map(file => {
      return async () => {
        const relativeFilePath = path.relative(inputFolder, file);
        const relativeFolderPath = path.dirname(relativeFilePath);
        const fileExt = path.extname(file);
        const relativeFilePathNoExt = relativeFilePath.substr(
          0,
          relativeFilePath.length - fileExt.length
        );

        console.log(`convert image: ${relativeFilePath}`);

        await fs.ensureDir(
          path.resolve(outputFolder, path.dirname(relativeFilePathNoExt))
        );

        await promiseSerial(
          scales.map(scale => {
            return async () => {
              const image = sharp(file);
              const metadata = await image.metadata();
              const imageWidth = Math.round(metadata.width * scale);
              const targetRelativeFileNameWithoutExtension = `${relativeFilePathNoExt}_${Math.round(
                scale * 100
              )}`;

              const targetExtension =
                fileExt.substr(1) === 'png' ? 'png' : 'jpg';
              const imageResized = await image.resize(imageWidth);

              console.log(
                `creating image: ${targetRelativeFileNameWithoutExtension}.webp`
              );

              await imageResized.toFile(
                path.resolve(
                  outputFolder,
                  `${targetRelativeFileNameWithoutExtension}.webp`
                )
              );

              console.log(
                `creating image: ${targetRelativeFileNameWithoutExtension}.${targetExtension}`
              );

              await imageResized.toFile(
                path.resolve(
                  outputFolder,
                  `${targetRelativeFileNameWithoutExtension}.${targetExtension}`
                )
              );

              if (targetExtension === 'png') {
                await imagemin(
                  [
                    `${outputFolder}/${targetRelativeFileNameWithoutExtension}.${targetExtension}`
                  ],
                  path.resolve(outputFolder, relativeFolderPath),
                  {
                    plugins: [imageminPngquant({quality: `70-80`})]
                  }
                );
              }
            };
          })
        );
      };
    })
  );
};

init();



